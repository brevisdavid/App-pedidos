
@extends('layouts.app')
@section('body-class','product-page')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">

</div>

<div class="main main-raised">
    <div class="container"> 

        <div class="section ">
            <h2 class="title text-center">Editar producto seleccionado</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                   @foreach ( $errors->all() as $error)
                     <li>{{$error}}</li>  
                   @endforeach
               </ul>
            </div>
            @endif
            <form method="post" action="{{url('/admin/products/'.$product->id.'/edit')}}">
             {{ csrf_field() }}
            <div class="row">
             <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
              </div>
             <div class="col-sm-6">
             <div class="form-group label-floating">
                <label class="control-label">Precio del producto</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{$product->price}}">
             </div>
             </div>
             <div class="col-sm-6">
             <div class="form-group label-floating">
                <label class="control-label">Descripcion producto</label>
                <input type="text" class="form-control" name="description"value="{{old('description',$product->description)}}">
              </div> {{--{{$product->description}} sintasis para mostrar los productos ingresados--}}
             </div>
             <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Stock de producto</label>
                    <input type="number" step="0.01" class="form-control" name="stock" value="{{$product->stock}}">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group label-floating">
                <label class="control-label">Categoría del producto</label>
                <select name="category_id" class="form-control"title="Seleccione categoría" required>
                    <option value="0" >General</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" 
                        @if ($category->id==old('category_id',$product->category_id))selected   
                        @endif>{{$category->name}}</option>    
                    @endforeach
                </select>
                </div>
                </div>
            </div>
            
            <textarea class="form-control" name="long_description" placeholder="Descripcion detallada del producto" rows="5">
                {{old('long_description',$product->long_description)}}
            </textarea>
            <button type="submit"  class="btn btn-success">Guardar cambios</button>
            <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>

@include('includes.footer')

@endsection