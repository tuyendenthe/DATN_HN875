<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Facades;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProducts = Product::with('Categories')->get();
     

        return view('admins.tables')->with([
            'listProducts' => $listProducts
        ]);
    }

    public function addProduct()
    {

        $Categories = Categories::where('status_delete',Categories::UNDELETE)->get();
        return view('admins.add-product',compact('Categories'));
    }

    public function addPostProduct(ProductRequest $req)
    {

        $path = null;
        if ($req->hasFile('image')) {
           $path = $req->file('image')->store('images/products','public');
        }

        $data =  [
            'name' => $req->name,
            'image' => $path,
            'price' => $req->price,
            'content_short' => $req->content_short,
            'content' => $req->content,
            'price' => $req->price,
            'content_short' => $req->content_short,
            'cate_id' => $req->category_id
        ];

        Product::create($data);
        return redirect()->route('products.listProduct');
    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        $Categories = Categories::where('status_delete',Categories::UNDELETE)->get();
        return view('admins.update-product',compact('Categories'))->with([
            'product' => $product
        ]);
    }

    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : $fileName;

        return $file->storeAs($folder, $fileName);
    }

    public function updatePutProduct(ProductRequest $req, $id)
    {
        $product = Product::find($id);
        $path =  $product->image;

        if ($req->hasFile('image')) {
            $path = $this->saveFile(
                $req->image,
                $req->name,
                'images/products/'
            );
        }

        $data =  [
            'name' => $req->name,
            'price' => $req->price,
            'image' => $path,
            'content' => $req->content,
            'content_short' => $req->content_short,
            'cate_id' => $req->category_id

        ];
        $product->update($data);
        return redirect()->route('products.listProduct');
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.listProduct');
    }

}
