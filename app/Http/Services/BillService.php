<?php


namespace App\Http\Services;

use App\Contract;
use App\Detail;
use App\Http\Controllers\Major;
use App\Http\Repositories\BillRepository;
use App\Http\Repositories\ContractRepository;
use App\Http\Repositories\DetailRepository;
use Illuminate\Support\Facades\Auth;


class BillService
{
    protected $billRepo;
    protected $detailRepo;
    protected $contractRepo;

    public function __construct(BillRepository $billRepo,
                                DetailRepository $detailRepo,
                                ContractRepository $contractRepo)
    {
        $this->billRepo = $billRepo;
        $this->detailRepo = $detailRepo;
        $this->contractRepo = $contractRepo;
    }

    public function getAll()
    {
        return $this->billRepo->getAll();
    }

    public function countGetAll()
    {
        return $this->billRepo->countGetAll();
    }

    public function findById($id)
    {
        return $this->billRepo->findById($id);
    }

    public function update($request, $id)
    {
        $bill = $this->billRepo->findById($id);
        $bill->status = $request->status;
        $details = $this->detailRepo->find($id);
        $contract = new Contract();
        $contract->bill_id = $id;
        $contract->note = $request->note;
        $contract->status = $request->status;
        $contract->create_by = Auth::user()->email;
        $this->contractRepo->save($contract);
        $sumProductBill = 0;
        $sumProduct = 0;
        foreach ($details as $detail) {
            $sumProductBill += $detail->quantityProduct;
            $sumProduct += $detail->product->quantity;
        }
        if ($bill->status == Major::FINISH) {
            if ($sumProductBill <= $sumProduct) {
                foreach ($details as $detail) {
                    $detail->product->quantity = ($detail->product->quantity) - ($detail->quantityProduct);
                    $this->detailRepo->save($detail->product);
                    $this->billRepo->save($bill);
                }
                toastr()->success('Xác nhận giao dịch thành công ');
                return back();
            } else {
                toastr()->error('Số lượng sản phẩm đặt hàng và số lượng tồn kho không khớp, vui lòng kiểm tra lại ');
                return back();
            }
        } elseif ($bill->status == Major::SHIPPING) {
            if ($sumProductBill <= $sumProduct) {
                $this->billRepo->save($bill);
                toastr()->success('Xác nhận giao dịch thành công ');
                return back();
            } else {
                toastr()->error('Số lượng sản phẩm đặt hàng và số lượng tồn kho không khớp, vui lòng kiểm tra lại ');
                return back();
            }
        } else {
            $this->billRepo->save($bill);
            toastr()->success('Xác nhận giao dịch thành công ');
            return back();
        }
    }

    public function fitterStatus($request)
    {
        $status = $request->status;
        return $this->billRepo->fitterStatus($status);
    }

    public function countFitterStatus($request)
    {
        $status = $request->status;
        return $this->billRepo->countFitterStatus($status);
    }

    public function billWaiting()
    {
        return $this->billRepo->billWaiting();
    }

    public function countBillWaiting()
    {
        return $this->billRepo->countBillWaiting();
    }

    public function listWaiting()
    {
        return $this->billRepo->listWaiting();
    }

    public function countListWaiting()
    {
        return $this->billRepo->countListWaiting();
    }

    public function updateReadBill($id)
    {
        $bill = $this->billRepo->findById($id);
        $bill->unread = 2;
        $this->billRepo->save($bill);
    }
}
