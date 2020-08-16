<?php


namespace App\Http\Services;


use App\Bill;
use App\Customer;
use App\Detail;
use App\Http\Controllers\Major;
use App\Http\Repositories\BillRepository;
use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\DetailRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class CustomerService
{
    protected $customerRepo;
    protected $billRepo;
    protected $detailRepo;

    public function __construct(CustomerRepository $customerRepo,
                                BillRepository $billRepository,
                                DetailRepository $detailRepo)
    {
        $this->customerRepo = $customerRepo;
        $this->billRepo = $billRepository;
        $this->detailRepo = $detailRepo;
    }

    public function create($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $this->customerRepo->save($customer);

        $bill = new Bill();
        $bill->note = $request->note;
        $bill->status = Major::WAITING;
        $bill->totalPrice = Cart::subtotal();
        $bill->customer_id = $customer->id;
        $this->billRepo->save($bill);

        foreach (Cart::content() as $item) {
            $detail = new Detail();
            $detail->bill_id = $bill->id;
            $detail->product_id = $item->id;
            $detail->quantityProduct = $item->qty;
            $this->detailRepo->save($detail);
        }
    }

    public function getAll()
    {
        return $this->customerRepo->getAll();
    }
}
