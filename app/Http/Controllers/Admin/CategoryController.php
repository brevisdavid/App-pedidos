<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use File;
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
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $path=public_path().'/images/categories';
                $fileName=uniqid().$file->getClientOriginalName();
                $moved=$file->move($path,$fileName);
                //Crearemos registro a la base de datos tabla product_images
                if ($moved) {
                $category->image=$fileName;
               // $productImage->featured=('false');
                $category->save();//Insertamos productos a la db
            }
         }
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
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $path=public_path().'/images/categories';
                $fileName=uniqid().$file->getClientOriginalName();
                $moved=$file->move($path,$fileName);
                //Crearemos registro a la base de datos tabla product_images
                if ($moved) {
                $anteriorPath=$path.'/'.$category->image;
                $category->image=$fileName;
               // $productImage->featured=('false');
               $save=$category->save();//Insertamos imagen categoria a la db
               if($save)//con esta codicion realizamos el reemplazo de la imagen y a su ves la eliminamos
                File::delete($anteriorPath);
            }
         }
           // $category->save();
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
    

   

  
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back();   
    }
}
