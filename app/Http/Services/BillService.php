<?php


namespace App\Http\Services;

use App\Detail;
use App\Http\Controllers\Major;
use App\Http\Repositories\BillRepository;
use App\Http\Repositories\DetailRepository;


class BillService
{
    protected $billRepo;
    protected $detailRepo;

    public function __construct(BillRepository $billRepo,
                                DetailRepository $detailRepo)
    {
        $this->billRepo = $billRepo;
        $this->detailRepo = $detailRepo;
    }

    public function getAll()
    {
        return $this->billRepo->getAll();
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
}
