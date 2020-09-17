<?php


namespace App\Http\Repositories;


use App\Contract;

class ContractRepository
{
    protected $contractModel;

    public function __construct(Contract $contractModel)
    {
        $this->contractModel = $contractModel;
    }

    public function save($contract)
    {
        $contract->save();
    }

    public function getById($id)
    {
        return $this->contractModel->where('bill_id', $id)->orderBy('created_at','DESC')->get();
    }
}
