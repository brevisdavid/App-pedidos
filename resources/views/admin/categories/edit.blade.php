
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
            <form method="post" action="{{url('/admin/categories/'.$category->id.'/edit')}}">
             {{ csrf_field() }}
            <div class="row">
             <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Descripción categoría</label>
                    <input type="text" class="form-control" name="description"value="{{old('description',$category->description)}}">
                </div> {{--{{$product->description}} sintasis para mostrar los productos ingresados--}}
              </div>
            
            </div>
          
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