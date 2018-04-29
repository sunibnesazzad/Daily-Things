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

    //deleting category
    public function destroy($id){
        Category::where('id',$id)->delete($id);

        return redirect('/category')->with('success', 'Category deleted successfully!');
    }
}
