<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;
use App\Product;


class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function store($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->cate;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $product->save();
        $this->productRepo->save($product);

    }
}
