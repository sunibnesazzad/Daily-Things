<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //showing all categories
    public function index(){
        $categorys= Category::all();
        return view('category.index',compact('categorys'))->with('title','Categories');
    }

    //showing create view
    public function create(){

        return view('category.create')->with('title',"Add Category");
    }

    //storing in database
    public function store(Request $request){

        //validation
        $this->validate($request,[
            'name' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->input('name');

        $category->save();
        return redirect('category')->with('success','Category added successfully!');

    }

    //showing category update page
    public function update($id){
        $category = Category::find($id);
        return view('category.update',compact('category'))->with('title','Update Category');

    }

    //storing updated category
    public function edit(Request $request,$id){

        //validation
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data = array(
            'name' => $request->input('name'),
        );
        //updating in database
        Category::where('id',$id)->update($data);

        return redirect('category')->with('success','Category updated successfully!');
    }

    //deleting category
    public function destroy($id){
        Category::where('id',$id)->delete($id);

        return redirect('category')->with('success', 'Category deleted successfully!');
    }
}
