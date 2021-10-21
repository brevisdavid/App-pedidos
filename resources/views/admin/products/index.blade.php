
@extends('layouts.app')
@section('body-class','product-page')
@section('title','Listado de Productos')
@section('content') 
<div class="header header-filter" style="background-image: url('{{asset('img/limpio.png')}}');">');">
   
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>

            <div class="team">
                <div class="row">
                    <a href="{{url('/admin/products/create')}}"  class="btn btn-primary">Nuevo producto</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Stock</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product) 
                            <tr>
                                <td class="text-center">{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category_name}}</td>
                                <td class="text-right">{{$product->price}}</td>
                                <td class="text-right">{{$product->stock}}</td>
                                <td class="td-actions text-right">
                                   
                                    <form action="{{url('/admin/products/'.$product->id.'/delete')}}" method="post">
                                        {{ csrf_field() }}
                                        <a href="{{url('/products/'.$product->id)}}" target="_blank"  type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('/admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}               
                </div>
                
            </div>

        </div>
    </div>
</div>

@include('includes.footer')

@endsection
