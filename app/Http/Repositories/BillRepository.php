<?php


namespace App\Http\Repositories;


use App\Bill;

class BillRepository
{
    protected $billMode;

    public function __construct(Bill $billMode)
    {
        $this->billMode = $billMode;
    }

    public function getAll()
    {
        return $this->billMode->all();
    }

    public function save($bill)
    {
        $bill->save();
    }

    public function findById($id)
    {
        return $this->billMode->findOrFaid($id);
    }

    public function destroy($bill)
    {
        $bill->delete();
    }
}
