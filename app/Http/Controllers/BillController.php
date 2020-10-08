<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Requests\FormBillRequest;
use App\Http\Services\BillService;
use App\Http\Services\ContractService;
use App\Http\Services\CustomerService;
use App\Http\Services\DetailService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $customerService;
    protected $billService;
    protected $detailService;
    protected $contractService;

    public function __construct(CustomerService $customerService,
                                BillService $billService,
                                DetailService $detailService,
                                ContractService $contractService)
    {
        $this->customerService = $customerService;
        $this->billService = $billService;
        $this->detailService = $detailService;
        $this->contractService = $contractService;
    }

    public function payment(FormBillRequest $request)
    {
        $this->customerService->create($request);
        toastr()->success('Đơn hàng của bạn đang được xử lý ');
        Cart::destroy();
        return redirect()->route('products.shop');
    }

    public function index()
    {
        $statuses = Major::STATUSES;
        $bills = $this->billService->getAll();
        $quantity = $this->billService->countGetAll();
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('bills.list', compact('bills', 'statuses', 'quantity', 'billss', 'countBill'));
    }

    public function show($id)
    {
        $bill = $this->billService->findById($id);
        $details = $this->detailService->find($id);
        $contracts = $this->contractService->getById($id);
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('bills.detail', compact('bill', 'details', 'contracts', 'billss', 'countBill'));
    }

    public function update(Request $request, $id)
    {
        return $this->billService->update($request, $id);
    }

    public function fitterStatus(Request $request)
    {
        $statuses = Major::STATUSES;
        $bills = $this->billService->fitterStatus($request);
        $quantity = $this->billService->countFitterStatus($request);
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('bills.list', compact('bills', 'statuses', 'quantity', 'billss', 'countBill'));
    }

    public function listWaiting()
    {
        $bills = $this->billService->listWaiting();
        $billss = $this->billService->billWaiting();
        $quantity = $this->billService->countListWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('bills.listWaiting', compact('billss', 'bills', 'quantity', 'countBill'));
    }

    public function updateReadBill($id)
    {
        $this->billService->updateReadBill($id);
        $data = [
            'status' => 'thanh cong'
        ];
        return response()->json($data);
    }
}
