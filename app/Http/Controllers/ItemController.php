<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //showing all categories
    public function index(){
        $items= Item::all();
        return view('items.index',compact('items'))->with('title','Items');
    }

    //deleting category
    public function destroy($id){
        Item::where('id',$id)->delete($id);

        return redirect('/item')->with('success', 'Item deleted successfully!');
    }
    //showing create view
    public function create(){

        $categorys= Category::all();
        return view('items.create',compact('categorys'))->with('title',"Create Items");
    }

    //storing in database
    public function store(Request $request){

        //validation
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'purchase_date' => 'required',
        ]);
        //storing in database post
        $item = new Item();
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->category_id = $request->input('category');
        $item->quantity = $request->input('quantity');
        $item->date_of_purchase = $request->input('purchase_date');
        $item->save();

        return redirect('/item')->with('success', 'Item added successfully!');
    }

    //Showing the update Page
    public function update($id){
        $item = Item ::find($id);
        $categorys= Category::all();
        return view('items.update',compact('item','categorys'))->with('title',"Edit Item");
    }

    //Storing updated Post
    public function edit(Request $request,$id){
        //validation
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'purchase_date' => 'required',
        ]);

        $data = array(
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'date_of_purchase' => $request->input('purchase_date'),

        );
        //updating in database
        Item::where('id',$id)->update($data);

        return redirect('/item')->with('success', 'Item updated successfully!');

    }

}
