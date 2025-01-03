<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use App\Models\Ram;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Facades;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Category;
use App\Models\FlashSale;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProduct(Request $request)
    {
        session()->forget('new_order'); // Xóa thông báo đơn hàng mới

        // Khởi tạo truy vấn
        $query = Product::with('category');

        // Nếu có tìm kiếm theo tên sản phẩm
        if ($request->has('name') && !empty($request->name)) {
            $request->validate([
                'name' => 'string',
            ]);
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Phân trang sản phẩm
        $listProducts = $query->paginate(10); // Số lượng sản phẩm trên mỗi trang

        return view('admins.tables')->with([
            'listProducts' => $listProducts,
        ]);
    }

    public function addProduct()
    {
        $data = Category::get();
        $memories = Memory::all();
        $rams = Ram::all();
        // dd($data);
        $products = Product::where('is_attributes',2)->get();
        // $Categories = Categories::where('status_delete', Categories::UNDELETE)->get();
        return view('admins.add-product', compact('data','products', 'memories', 'rams'));
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
        // dd($req);
        $data =  [
            'name' => $req->name,
            'quantity' => $req->quantity,
            'image' => $path,
            'price' => $req->price,
            'content_short' => $req->content_short,
            'content' => $req->content,



            'chip' => $req->chip,

            'ram_id' => $req->ram_id,

            'color' => $req->color,


            'memory_id' => $req->memory_id,

            'screen' => $req->screen,

            'resolution' => $req->resolution,

            'is_attributes' => $req->is_attributes ?? 2,
            'product_parent' => $req->product_parent,


        ];
        if($req->is_attributes == 1){
            $productParent = Product::find($req->product_parent);
            $data['category_id'] = $productParent->category_id;
            $data['role'] = $productParent->role;
        }else{
            $data['category_id'] = $req->category_id;
            $data['role'] = $req->role;
        }

        Product::create($data);
        return redirect()->route('products.listProduct')->with('message1', 'Thêm thành công');


        // return redirect()->route('products.listProduct');
    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        $category = Category::get();
        $products = Product::get();
        $memories = Memory::all();
        $rams = Ram::all();

        return view('admins.update-product', compact('category','product','products', 'rams', 'memories'))
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

    public function updatePutProduct(Request $req, $id)
    {
        // dd($req);
        $product = Product::find($id);
        $path = $product->image;
        if ($req->hasFile('image')) {
            // $path = $req->file('image')->store('images/products', 'public');
            $data['image'] = $this->upload_image($req->file('image'));
            $path = $data['image'];
        }
        $data =  [
            'name' => $req->name,

            'image' => $path,

            'price' => $req->price,
            'content_short' => $req->content_short,
            'content' => $req->content,
            'chip' => $req->chip,

            'ram_id' => $req->ram_id,

            'color' => $req->color,
            'quantity' => $req->quantity,

            'memory_id' => $req->memory_id,

            'screen' => $req->screen,

            'resolution' => $req->resolution,

            'is_attributes' => $req->is_attributes ?? 2,
            'product_parent' => $req->product_parent,


        ];
        if($req->is_attributes == 1){

            $productParent = Product::find($req->product_parent);

            $data['category_id'] = $productParent->category_id;
            $data['role'] = $productParent->role;
        }else{
            $data['category_id'] = $req->category_id;
            $data['role'] = $req->role;
        }

        $product->update($data);

        if($product->is_attributes == 2 ) {
            $product_child = Product::where('product_parent', $id)->get();
            foreach($product_child as $child) {
               $product_child_update = Product::find($child->id);
               $product_child_update->update([
                    'role' => $req->role,
                    'category_id' => $req->category_id
               ]);
            }
        }
        // return redirect()->route('products.listProduct');
        return redirect()->route('products.listProduct')->with('message1', 'Cập nhật thành công.');
    }


    // public function deleteProduct($id)
    // {
    //     $product = Product::find($id);
    //     $product->delete();
    //     return redirect()->route('products.listProduct');
    // }
    public function deleteProduct($id)
{
    $product = Product::find($id);

    if ($product) {
        // Xoá các bản ghi liên quan trong bảng flash_sales
        $product->flashSales()->delete();

        // Xoá sản phẩm
        $product->delete();


//         $fls = FlashSale::where('product_id','=',$id)->first()->get();
//         if(!empty($fls)){
//         DB::table('flash_sales')->where('product_id', $id)->delete();
//     }

//         // return redirect()->route('products.listProduct');
//         return redirect()->route('products.listProduct')->with('message1', 'Xóa thành công.');


    }

    return redirect()->route('products.listProduct')->with('success', 'Sản phẩm và các Flash Sales liên quan đã được xoá!');
}

}
