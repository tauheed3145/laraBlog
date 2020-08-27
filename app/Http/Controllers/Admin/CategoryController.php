<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Exception;
use Facade\FlareClient\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;
    public function __construct(Category $category)
    {
        $this->category=$category;
    }

    public function index()
    {
        
        //
        $categories=$this->category->get();
        return view('admin_panel.category.index',compact('categories'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'cat_name'=>'required|max:100'
       ]);
       try{
        $form_data=[
            'cat_name'=>$request->cat_name??"",
           ];
           $create=$this->category->create($form_data);
           return redirect()->back()->with('success','added');


       }
       catch(Exception $e){

       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $category_data=$this->category->find($id);
        if($category_data)
        {
            $form_data=[
                'cat_name'=>$request->cat_name??$category_data->cat_name,
               ];
           $category_data->update($form_data);
        }
        return redirect()->back()->with('error','updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_data=$this->category->find($id);
        if($category_data)
        {
            $category_data->delete();
        }
        return redirect()->back()->with('success','deleted');
    }
        
    
}
