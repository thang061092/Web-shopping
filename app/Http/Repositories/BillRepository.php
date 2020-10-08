<?php


namespace App\Http\Repositories;


use App\Bill;
use App\Http\Controllers\Major;

class BillRepository
{
    protected $billModel;

    public function __construct(Bill $billModel)
    {
        $this->billModel = $billModel;
    }

    public function getAll()
    {
        return $this->billModel->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function countGetAll()
    {
        return $this->billModel->count();
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

    public function countFitterStatus($status)
    {
        return $this->billModel->where('status', $status)->count();
    }

    public function billWaiting()
    {
        return $this->billModel->where('status',Major::WAITING)->orderBy('created_at','DESC')->limit(5)->get();
    }

    public function countBillWaiting()
    {
        return $this->billModel->where('status',Major::WAITING)->orderBy('created_at','DESC')->count();
    }

    public function listWaiting()
    {
        return $this->billModel->where('status',Major::WAITING)->orderBy('created_at','DESC')->paginate(10);
    }

    public function countListWaiting()
    {
        return $this->billModel->where('status',Major::WAITING)->orderBy('created_at','DESC')->count();
    }
}
