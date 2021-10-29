
@extends('layouts.app')
@section('body-class','product-page')
@section('title','Listado de Productos')
@section('content') 
<div class="header header-filter" style="background-image: url('{{asset('img/limpio.png')}}');">');">
   
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="section text-center">
            <h2 class="title">Listado de Categorías</h2>

            <div class="team">
                <div class="row">
                    <a href="{{url('/admin/categories/create')}}"  class="btn btn-primary">Nuevo Categoria</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category) 
                            <tr>
                                <td class="text-center">{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{$category->featured_image_url}}" height="50"></td>
                                <td class="td-actions text-right">
                                   
                                    <form action="{{url('/admin/categories/'.$category->id)}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="#" type="button" rel="tooltip" title="Ver Categoría" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar Categoría" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar Categoría" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                                
                    {{ $categories->links() }}
                 
                    
                </div>
            </div>

        </div>


        
    </div>

</div>

@include('includes.footer')

@endsection