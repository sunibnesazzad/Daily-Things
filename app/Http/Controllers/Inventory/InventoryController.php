<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Setting\InventoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Setting\CategoryRepository;
use App\Services\Inventory\InventoryService;

class InventoryController extends Controller
{
    private $inventoryService;
    private $categoryRepository;

    public function __construct(InventoryService $inventoryService, CategoryRepository $categoryRepository)
{
    $this->inventoryService = $inventoryService;
    $this->categoryRepository = $categoryRepository;
}

    public function index()
    {
        return view('admin.setting.inventory.index')->with('title','Inventory');
    }
    //for ajax datatable
    public function getItems()
    {
        $items = $this->inventoryService->baseRepository()->ajaxDatatable();
        return $items;
    }

   /* Create view*/
   public function create()
   {
       $categories = $this->categoryRepository->getAllCategory();
       return view('admin.setting.inventory.create',compact('categories'))->with('title', 'Create Inventory');
   }

   /*Storing data*/
   public function store(InventoryRequest $request)
   {
     $item = $this->inventoryService->store($request);
       if($item){
           return redirect()->route('inventory.index')->with('success','Inventory created successfully.');
       }
       return redirect()->back()->with('error','Something went wrong. Try again.');
   }


}
