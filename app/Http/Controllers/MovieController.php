<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{   //to list page
    public function listPage(){
        $movie=Movie::when(request('searchKey'),function($query){
            $query->where('name','like','%'.request('searchKey').'%');
        })
        ->orderBy('updated_at','desc')->paginate(6);
        return view('admin.product.list',compact('movie'));
    }
    //to view page
    public function viewPage($id){
        $data=Movie::where('id',$id)->first();
        $category=Category::get();
        return view('admin.product.view',compact('data','category'));
    }
    //to create page
    public function createPage(){
        $category=Category::select('id','name')->get();
        return view('admin.product.create',compact('category'));
    }
    //create
    public function create(Request $request){
        $this->checkValidation($request, "create");
        $data=$this->getData($request);

        if($request->hasFile('image')){
            $fileName=uniqid(). $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image']=$fileName;
        }
        Movie::create($data);
        return redirect()->route('movie#listPage');
    }
    //delete
    public function delete($id){
        Movie::where('id',$id)->delete();
        return redirect()->route('movie#listPage')->with(['deleteSuccess'=>'Movie deleted!']);
    }
    //to edit page
    public function edit($id){
        $data=Movie::where('id',$id)->first();
        $category=Category::get();
        return view('admin.product.update',compact('data','category'));
    }
    //update
    public function update(Request $request){
        $this->checkValidation($request, "update");
        $data=$this->getData($request);
        if($request->hasFile('image')){
            $oldImage=Movie::where('id',$request->movieId)->first();
            $oldImage=$oldImage->image;
            Storage::delete('public/'.$oldImage);
            $fileName=uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image']=$fileName;
        }
        Movie::where('id',$request->movieId)->update($data);
        return redirect()->route('movie#listPage');
    }
    private function getData($request){
        return[
            'name' => $request->name,
            'time' => $request->time,
            'released_date' => $request->releasedDate,
            'category_id' => $request->categoryId,
            'description' => $request->description,
        ];
    }


    private function checkValidation($request,$action){
        $validationRules=[
            'name'=>'required|unique:movies,name,'.$request->movieId,
            'time'=> 'required',
            'releasedDate'=>'required',
            'description'=> 'required',
            'categoryId'=> 'required',
        ];
        $validationRules['image'] = $action == "create" ? 'required' : "mimes:png,jpg,jpeg,svg,webp|file";
        Validator::make($request->all(),$validationRules)->validate();
    }
}
