<?php


namespace App\Http\Services;


use App\Http\Controllers\Status;
use App\Http\Repositories\ProductRepository;
use App\Product;
use Illuminate\Support\Facades\Storage;


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
        $product->status = Status::ACTIVE;
        $product->codeSale = Status::DEFAULT;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $this->productRepo->save($product);
    }

    public function findById($id)
    {
        return $this->productRepo->findById($id);
    }

    public function allDesc()
    {
        return $this->productRepo->allDesc();
    }

    public function update($product, $request)
    {
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->cate;
        if ($request->hasFile('image')) {
            $currentImg = $product->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $this->productRepo->save($product);
    }

    public function allAsc()
    {
        return $this->productRepo->allAsc();
    }

    public function searchProduct($request)
    {
        $keyword = $request->searchProduct;
        return $this->productRepo->searchProduct($keyword);
    }

    public function searchHome($request)
    {
        $keyword = $request->search;
        return $this->productRepo->searchHome($keyword);
    }

    public function filterCategory($request)
    {
        $category = $request->category;
        return $this->productRepo->filterCategory($category);
    }

    public function blockProduct($product)
    {
        $product->status = Status::BLOCK;
        $this->productRepo->save($product);
    }

    public function getProductBlock()
    {
        return $this->productRepo->getProductBlock();
    }

    public function activeProduct($product)
    {
        $product->status = Status::ACTIVE;
        $this->productRepo->save($product);
    }

    public function changeSale($product, $request)
    {
        $product->codeSale = $request->code;
        $this->productRepo->save($product);
    }
}
