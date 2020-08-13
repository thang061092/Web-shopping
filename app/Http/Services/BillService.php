<?php


namespace App\Http\Services;

use App\Http\Repositories\BillRepository;


class BillService
{
    protected $billRepo;

    public function __construct(BillRepository $billRepo)
    {
        $this->billRepo = $billRepo;
    }

}
