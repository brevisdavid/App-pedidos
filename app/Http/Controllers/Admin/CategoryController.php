<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
   
    public function index()
    {
        $categories=Category::paginate(5);
        return view ('admin.categories.index')->with(compact('categories'));
    }

    
    public function create()
    {
        return view ('admin.categories.create');  
    }


    public function store(Request $request)
    {
        $messages=[
            'name.required'=> 'Debes ingresar nombre de la categoría',
            'name.min'=> 'El nombre de categoría debe tener mas de 3 caracteres',
            'description.max'=> 'AH sobreepasado numero de caracteres'
         ];
            $rules=[//reglas de validacion
            "name"=> 'required|min:3',
            "description"=> 'max:200'
            ]; 
            $this->validate($request,$rules,$messages);
            $category=new Category();
            $category->name=$request->input('name');
            $category->description=$request->input('description');
            $category->save();//Insertamos productos a la db
            return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $messages=[
            'name.required'=> 'Debes ingresar nombre de la categoría',
            'name.min'=> 'El nombre de categoría debe tener mas de 3 caracteres',
            'description.max'=> 'AH sobreepasado numero de caracteres'
         ];
            $rules=[//reglas de validacion
            "name"=> 'required|min:3',
            "description"=> 'max:200'
            ]; 
            $this->validate($request,$rules,$messages);
            $category=Category::find($id);
            $category->name=$request->input('name');
            $category->description=$request->input('description');
            $category->save();//Insertamos productos a la db
            return redirect('/admin/categories');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.categories.edit')->with(compact('category')); 
    }
   //
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back();   
    }
}
