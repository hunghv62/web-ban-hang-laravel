<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use App\Repositories\SaleRepository;
use App\Product;

class ProductController extends Controller
{
    protected $productReporsitory;
    public function __construct(
        ProductRepository $productReporsitory,
        SaleRepository $saleRepository
    )
    {
        $this->productReporsitory = $productReporsitory;
        $this->saleRepository = $saleRepository;
    }
    public function edit($id)
    {
        $products = $this->productReporsitory->find($id);
        return view('product.edit', compact('products'));
    }
    public function store(ProductRequest $request)
    {
        if ($request->image_file) {
            $request->image_file->storeAs('public/images', 'product' . $id . '.png');
            $request['image'] = ('storage/images/product' . $id . '.png');
        } else {
            $request['image'] = null;
        }
        try {
            $data = $request->only('product_name', 'product_counts',
                                   'products_type','product_in_prices','product_out_prices', 'image','product_des');
            $this->productReporsitory->create($data);
            return redirect()->route('product.index')
            ->with('success', 'Created Success!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productReporsitory->getAll();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $image_url = $this->productReporsitory->find($id)->first()->image;
        if ($request->image_file) {
            $request->image_file->storeAs('public/images', 'product' . $id . '.png');
            $request['image'] = ('storage/images/product' . $id . '.png');
        } else {
            $request['image'] = $image_url;
        }
        try {
            $this->productReporsitory->update($id, $request->only('product_name', 'product_counts',
                                                                  'products_type','product_in_prices','product_out_prices', 'image','product_des'));
            return redirect()->route('product.index')
            ->with('success', 'Updated Success!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->productReporsitory->delete($id);
            return redirect()->route('product.index')
            ->with('success', 'Deleted Success!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function show()
    {
        $phones = $this->productReporsitory->getProductCategory(Product::CATEGORY_CODE['Điện thoại']);
        $accessorys = $this->productReporsitory->getProductCategory(Product::CATEGORY_CODE['Phụ kiện']);
        $laptops = $this->productReporsitory->getProductCategory(Product::CATEGORY_CODE['Laptop']);
        $tablets = $this->productReporsitory->getProductCategory(Product::CATEGORY_CODE['Máy tính bảng']);
        $watchs = $this->productReporsitory->getProductCategory(Product::CATEGORY_CODE['Đồng hồ']);
        $sales = $this->saleRepository->getAll();
        $sales1 = $this->saleRepository->last();
        $saleslimit = $this->saleRepository->limit();
        return view('customer.index', compact(
            'phones', 'accessorys', 'laptops', 'tablets', 'watchs','sales1','saleslimit'
        ));
    }
     public function detail($id)
    {
        $products = $this->productReporsitory->find($id);
        return view('product.detail', compact('products'));
    }
}

