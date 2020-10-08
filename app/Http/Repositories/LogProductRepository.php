<?php


namespace App\Http\Repositories;


use App\LogProduct;

class LogProductRepository
{
    protected $logProductModel;

    public function __construct(LogProduct $logProductModel)
    {
        $this->logProductModel = $logProductModel;
    }

    public function save($logProduct)
    {
        $logProduct->save();
    }

    public function detailProduct($id)
    {
        return $this->logProductModel->where('product_id',$id)->orderBy('created_at','DESC')->paginate(10);
    }

    public function countDetailProduct($id)
    {
        return $this->logProductModel->where('product_id',$id)->count();
    }
}
