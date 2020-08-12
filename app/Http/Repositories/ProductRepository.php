<?php


namespace App\Http\Repositories;


use App\Product;

class ProductRepository
{
    protected $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getAll()
    {
        return $this->productModel->all();
    }

    public function save($product)
    {
        $product->save();
    }

    public function findById($id)
    {
        return $this->productModel->findOrFail($id);
    }

    public function destroy($product)
    {
        $product->delete();
    }

}
