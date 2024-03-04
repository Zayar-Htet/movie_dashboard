<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function listPage(){
        $category=Category::when(request('searchKey'),function($query){
            $query->where('name','like','%'.request('searchKey').'%');
        })
        ->orderBy('updated_at', 'desc')->paginate(3);
        return view('admin.category',compact('category'));
    }
    //to create page
    public function createPage(){
        return view('admin.create');
    }
    //create
    public function create(Request $request){
        $this->checkValidation($request);
        $data=$this->getData($request);
        Category::create($data);
        return redirect()->route('list#page');
    }
    //delete
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('list#page')->with(['deleteSuccess'=>'Category deleted!']);
    }
    //to update page
    public function updatePage($id){
        $category=Category::where('id',$id)->first();
        return view('admin.update',compact('category'));
    }
    //update
    public function update(Request $request){
        $this->checkValidation($request);
        $data=$this->getData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('list#page');
    }
    private function getData($request){
        return[
            'name'=>$request->category,
        ];
    }
    private function checkValidation($request){
        Validator::make($request->all(),[
            'category' => 'required|min:5|unique:categories,name,'.$request->categoryId,
        ])->validate();
    }
}
