<?php


namespace App\Http\Repositories;


use App\Customer;

class CustomerRepository
{
    protected $customerModel;

    public function __construct(Customer $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function getAll()
    {
        return $this->customerModel->paginate(10);
    }

    public function countGetAll()
    {
        return $this->customerModel->count();
    }

    public function findById($id)
    {
        return $this->customerModel->findOrFail($id);
    }

    public function save($customer)
    {
        $customer->save();
    }

    public function destroy($customer)
    {
        $customer->delete();
    }
}
