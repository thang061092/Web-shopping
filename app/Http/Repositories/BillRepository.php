<?php


namespace App\Http\Repositories;


use App\Bill;

class BillRepository
{
    protected $billModel;

    public function __construct(Bill $billModel)
    {
        $this->billModel = $billModel;
    }

    public function getAll()
    {
        return $this->billModel->orderBy('created_at','DESC')->paginate(10);
    }

    public function save($bill)
    {
        $bill->save();
    }

    public function findById($id)
    {
        return $this->billModel->findOrFail($id);
    }

    public function destroy($bill)
    {
        $bill->delete();
    }

    public function fitterStatus($status)
    {
        return $this->billModel->where('status', $status)->paginate(10);
    }
}
