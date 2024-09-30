<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Facades;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProducts = Product::all();
        return view('admins.tables')->with([
            'listProducts' => $listProducts
        ]);
    }

    public function addProduct()
    {
        return view('admins.add-product');
    }

    public function addPostProduct(ProductRequest $req)
    {
        // dd($req);
        $path = null;

        if ($req->hasFile('image')) {
            $image = $req->image;
            $newName = $req->name . '_' . $image->hashName();
            $path = $image->storeAs('images/products', $newName);
            // $data['image'] = Storage::put('product',$req->file('product'));


        }
        $data =  [
            'name' => $req->name,
            'image' => $path,

            'content_short' => $req->content_short,
            'content' => $req->content,
        ];


        Product::create($data);
        return redirect()->route('products.listProduct') ;
    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        return view('admins.update-product')->with([
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
