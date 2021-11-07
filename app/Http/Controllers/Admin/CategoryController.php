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
        return view ('admin.categories.create'); //formulario de registro 
    }


    public function store(Request $request)
    {
       
           $this->validate($request,Category::$rules,Category::$messages);
           $category=Category::create($request->only('name','description'));
            /*$category=new Category();
            $category->name=$request->input('name');
            $category->description=$request->input('description'); */
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $path=public_path().'/images/categories';
                $fileName=uniqid().'-'.$file->getClientOriginalName();
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
    public function update(Request $request,Category $category)
    {
            $this->validate($request, Category::$rules,Category::$messages);
            $category->update($request->only('name','description'));
           /*  $category=Category::find($id);
            $category->name=$request->input('name');
            $category->description=$request->input('description');
           */
            
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $path=public_path().'/images/categories';
                $fileName=uniqid().'-'.$file->getClientOriginalName();
                $moved=$file->move($path,$fileName);
                //Crearemos registro a la base de datos tabla product_images
                if ($moved) {
                $anteriorPath=$path.'/'.$category->image;
                $category->image=$fileName;
               // $productImage->featured=('false');
               $saved=$category->save();//Insertamos imagen categoria a la db
               if($saved)//con esta codicion realizamos el reemplazo de la imagen y a su ves la eliminamos
                File::delete($anteriorPath);
            }
         }
           // $category->save();
            return redirect('/admin/categories');
            
    }
    


    public function edit(Category $category)
    {
        // $category=Category::find($id);
        return view('admin.categories.edit')->with(compact('category')); 
    }
   //

  
    public function destroy(Category $category)
    {
       //$category=Category::find($id);
       $category->delete();
        return back();   
    }
}
