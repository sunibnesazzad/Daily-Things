<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\CategoryRequest;
use App\Services\Category\CategoryService;
use App\Repositories\Setting\CategoryRepository;
use App\Category;

class CategoryController extends Controller
{
    private $categoryRepository;
    private $categoryService;
    public function __construct(CategoryRepository $categoryRepository, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }
    //showing all categories
    public function index()
    {
        $categorys= $this->categoryRepository->getAllCategory();
        return view('category.index',compact('categorys'))->with('title','Categories');
    }
    //showing create category page
    public function create()
    {
        return view('category.create')->with('title',"Add Category");
    }
    //storing in database
    public function store(CategoryRequest $request)
    {
        $category= $this->categoryService->store($request);
        if($category){
            return redirect()->route('category.index')->with('success','Inventory created successfully.');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');

    }
    //showing category update page
    /**
     * Update category
     * @param $id
     * @return view with id
     */
    public function update($id){
        $category = $this->categoryService->updateId($id);
        if($category){
            return view('category.update',compact('category'))->with('title','Update Category');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');
    }
    //storing updated category
    /**
     * Update category
     * @param $request
     * @param $id
     * @return mixed
     */
    public function edit(CategoryRequest $request,$id)
    {
        $category = $this->categoryService->updateCategory($request,$id);
        if($category){
            return redirect()->route('category.index')->with('success','Category Edited successfully.');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');
    }

}
