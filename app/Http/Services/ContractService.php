<?php


namespace App\Http\Services;


use App\Http\Repositories\ContractRepository;

class ContractService
{
    protected $contractRepo;

    public function __construct(ContractRepository $contractRepo)
    {
        $this->contractRepo = $contractRepo;
    }

    public function getById($id)
    {
        return $this->contractRepo->getById($id);
    }
}
