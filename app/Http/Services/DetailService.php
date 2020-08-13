<?php


namespace App\Http\Services;


use App\Http\Repositories\DetailRepository;

class DetailService
{
    protected $detailRepo;

    public function __construct(DetailRepository $detailRepo)
    {
        $this->detailRepo = $detailRepo;
    }
}
