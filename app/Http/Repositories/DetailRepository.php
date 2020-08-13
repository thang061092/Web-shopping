<?php


namespace App\Http\Repositories;


use App\Detail;

class DetailRepository
{
    protected $detailModel;

    public function __construct(Detail $detailModel)
    {
        $this->detailModel = $detailModel;
    }

    public function save($detail)
    {
        $detail->save();
    }
}
