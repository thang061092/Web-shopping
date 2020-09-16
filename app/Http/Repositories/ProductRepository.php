<?php


namespace App\Http\Repositories;


use App\Http\Controllers\status;
use App\Product;
use phpDocumentor\Reflection\Types\This;

class ProductRepository
{
    protected $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getAll()
    {
        return $this->productModel->where('status', status::ACTIVE)->paginate(5);
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

    public function allDesc()
    {
        return $this->productModel->where('status', Status::ACTIVE)->orderBy('created_at', 'DESC')->get();
    }

    public function allAsc()
    {
        return $this->productModel->where('status', Status::ACTIVE)->orderBy('created_at', 'ASC')->get();
    }

    public function searchProduct($keyword)
    {
        return $this->productModel->where('name', 'LIKE', '%' . $keyword . '%')->where('status', Status::ACTIVE)->paginate(5);
    }

    public function searchHome($keyword)
    {
        return $this->productModel->where('name', 'LIKE', '%' . $keyword . '%')->where('status', Status::ACTIVE)->paginate(5);
    }

    public function filterCategory($category)
    {
        return $this->productModel->where('category_id', $category)->where('status', Status::ACTIVE)->paginate(5);
    }

    public function getProductBlock()
    {
        return $this->productModel->where('status', status::BLOCK)->paginate(5);
    }

}
