<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    //
    public function index(){
        $Categories = Categories::where('status_delete',Categories::UNDELETE)->get();
        return view('admins.categories.index',compact('Categories'));
    }

    public function create(){
     
        return view('admins.categories.create');
    }

    public function store(Request $request){
        if(!$request->name){
            
            return redirect()->back();
        }
        $id = $this->codeGenerator(Categories::class);
        Categories::create([

            'id'=> $id,
            'name' => $request->name,
            'description' => $request->description,
           'status_delete' => Categories::UNDELETE,
           'uuid' =>  (string) Str::uuid(), 
        ]);
       

        return redirect()->route('categories.index');
    }

    public function codeGenerator()
    {
         $currentDate = date('ymd');
		$milliseconds = round(microtime(true) * 1000);
		$milliseconds = substr($milliseconds, -3);
		return $currentDate . $milliseconds;
    }

    public function delete(Request $request)
    {
    
        $delete = Categories::where('uuid', $request->uuid_cate)->first();
        $delete->update([
            'status_delete' =>Categories::DELETE
        ]);
      

        return redirect()->back();
    }

    public function edit($id){
        $Categories = Categories::where('uuid', $id)->first();

        return view('admins.categories.edit',compact('Categories'));
    }

    public function update(Request $request){

        if(!$request->name){

            return redirect()->back();
        }
        $Categories = Categories::where('uuid', $request->uuid)->first();
        $Categories->update([
           'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->route('categories.index');
    }
}
