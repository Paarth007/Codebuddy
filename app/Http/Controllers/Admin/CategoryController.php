<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $categories = Category::where('parent_category_id', null)->whereNull('deleted_at')->orderby('id', 'asc')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_category_id', null)->orderby('id', 'asc')->get();
        return view('admin.category.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'category_name'      => 'required',
            'parent_category_id' => 'nullable|numeric'
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'parent_category_id' =>$request->parent_category_id
        ]);
        return redirect('category')->with('success', 'Category has been added successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_category_id', null)->orderby('id', 'asc')->get();
        $data = Category::find($id);
        return view('admin.category.form',compact('categories','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'category_name'      => 'required',
            'parent_category_id' => 'nullable|numeric'
        ]);

        Category::whereId($id)->update([
            'category_name' => $request->category_name,
            'parent_category_id' =>$request->parent_category_id
        ]);
        return redirect('category')->with('success', 'Category has been updated successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::whereId($id)->update(['deleted_at' => NOW(),'updated_at'=>NOW()]);
        return redirect('category')->with('success', 'Category has been deleted successfully !!!');   
    }
}
