<?php


namespace App\Http\Services;


use App\Http\Repositories\LogProductRepository;

class LogProductService
{
    protected $logProductRepo;

    public function __construct(LogProductRepository $logProductRepo)
    {
        $this->logProductRepo = $logProductRepo;
    }

    public function detailProduct($id)
    {
        return $this->logProductRepo->detailProduct($id);
    }

    public function countDetailProduct($id)
    {
        return $this->logProductRepo->countDetailProduct($id);
    }
}
