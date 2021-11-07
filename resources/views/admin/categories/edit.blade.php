
@extends('layouts.app')
@section('body-class','product-page')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">

</div>

<div class="main main-raised">
    <div class="container"> 

        <div class="section ">
            <h2 class="title text-center">Editar categoría seleccionado</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                   @foreach ( $errors->all() as $error)
                     <li>{{$error}}</li>  
                   @endforeach
               </ul>
            </div>
            @endif
            <form method="post" action="{{url('/admin/categories/'.$category->id.'/edit')}}"enctype="multipart/form-data">
             {{ csrf_field() }}
            <div class="row">
             <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
             </div>
             <div class="col-sm-6">
                    <label class="control-label">Imagen de la categoría</label>
                    <input type="file" name="image">
                    @if ($category->image)
                    <p class="help-block">Subir si sólo requiere remplazar la <a href="{{asset('/images/categories/'.$category->image)}}" 
                    target="_blank">imagen actual</a>
                    </p>
                    @endif
             </div>
            </div>
             <div class="form-group label-floating">
                    <label class="control-label">Descripción de categoría</label>
                    <input type="text" class="form-control" name="description"value="{{old('description',$category->description)}}">
             </div> {{--{{$product->description}} sintasis para mostrar los productos ingresados--}}
              
            
            
          
           {{--  <textarea class="form-control" name="description" placeholder="Descripcion detallada del producto" rows="5">
                {{old('description',$category->description)}}
            </textarea> --}}
            <button type="submit"  class="btn btn-success">Guardar cambios</button>
            <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>

@include('includes.footer')

@endsection