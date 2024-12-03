<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Facades;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Category;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProducts = Product::with('category')->get();
        // dd($listProducts);

        return view('admins.tables')->with([
            'listProducts' => $listProducts
        ]);
    }

    public function addProduct()
    {
        $data = Category::get();
        // $Categories = Categories::where('status_delete', Categories::UNDELETE)->get();
        return view('admins.add-product', compact('data'));
    }
    public function upload_image($imageFile)
    {
        if ($imageFile) {
            $imageName = time() . '-' . uniqid() . '-' . $imageFile->getClientOriginalExtension();

            $imageFile->move(public_path('uploads'), $imageName);
            return 'uploads/' . $imageName;
        }
    }
    public function addPostProduct(ProductRequest $req)
    {
            // dd($req);

        $path = null;
        if ($req->hasFile('image')) {
            // $path = $req->file('image')->store('images/products', 'public');
            $data['image'] = $this->upload_image($req->file('image'));
            $path = $data['image'];
        }
        // dd($data['image']);

        $data =  [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'image' => $path,
            'price' => $req->price,
            'content_short' => $req->content_short,
            'content' => $req->content,



            'chip' => $req->chip,

            'ram' => $req->ram,

            'color' => $req->color,

            'memory' => $req->memory,

            'screen' => $req->screen,

            'resolution' => $req->resolution,
            'role' => $req->role,



        ];

        Product::create($data);
        return redirect()->route('products.listProduct');
    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        $category = Category::get();

        return view('admins.update-product', compact('category','product'))
        ;
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
        $path = $product->image;
        if ($req->hasFile('image')) {
            // $path = $req->file('image')->store('images/products', 'public');
            $data['image'] = $this->upload_image($req->file('image'));
            $path = $data['image'];
        }
        // dd($req);

        $data =  [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'image' => $path,
            'price' => $req->price,
            'content_short' => $req->content_short,
            'content' => $req->content,



            'chip' => $req->chip,

            'ram' => $req->ram,

            'color' => $req->color,

            'memory' => $req->memory,

            'screen' => $req->screen,

            'resolution' => $req->resolution,
            'role' => $req->role,



        ];
        // dd($data);
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
