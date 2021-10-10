
@extends('layouts.app')
@section('body-class','product-page')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">

</div>

<div class="main main-raised">
    <div class="container"> 

        <div class="section ">
            <h2 class="title text-center">Registrar nuevo producto</h2>
             @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error)
                      <li>{{$error}}</li>  
                    @endforeach
                </ul>
             </div>
                 
             @endif
        
            <form method="post" action="{{url('/admin/products')}}">
             {{ csrf_field() }}
            <div class="row">
             <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group label-floating">
                <label class="control-label">Descripcion producto</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}"  >
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group label-floating">
                <label class="control-label">Precio del producto</label>
                <input type="number" class="form-control" name="price" value="{{old('price')}}">
            </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Ingrese numero de productos</label>
                    <input type="number" class="form-control" name="stock" value="{{old('stock')}}">
                </div>
                </div>
          </div>
            <textarea class="form-control" name="long_description" placeholder="Descripcion detallada del producto" rows="5">
            {{old('long_description')}}
            </textarea>
            <button type="submit"  class="btn btn-success">Registrar producto</button>
            <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>

@include('includes.footer')

@endsection
<!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                  <b>Error Alert:</b> Damn man! You screwed up the server this time. You should find a good excuse for your Boss...
                </div>-->






                 <!--   <div class="container-fluid">
                 <div class="alert-icon">
                    <i class="material-icons">error_outline</i>
                  </div>-->
          {{--  @if (@errors-> any())
            <div class="alert alert-danger">
            
                  <ul>
                      @foreach ( @errors-> all() as @error)
                         
                      <li>{{ @error }}</li>
                          
                      @endforeach
                  </ul>
               
            </div>
           @endif--}}
                