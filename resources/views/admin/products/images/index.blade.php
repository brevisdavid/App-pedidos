
@extends('layouts.app')
@section('body-class','product-page')
@section('title','Imagenes de Productos')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">
   
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="section text-center">
            <h3 class="title">Imágenes de producto "{{$product->name}}"</h3>
            <div class="team">
             <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <input type="file" name="photo" required>
                       <button type="submit" class="btn btn-primary">Subir nueva imagen</button>
                       <a href="{{url('/admin/products')}}"  class="btn btn-default">Volver a listado de producto</a>        
                    </form>
               <hr>
                 @foreach ( $images as  $image  )
                 <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <img src="{{$image->url}}" alt="" width="250">
                        <form action="" method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <input type="hidden" name="image_id" value="{{$image->id}}">
                        <button type="submit" class="btn btn-danger btn-round">Eliminar</button>
                        @if ($image->featured)
                        <button type="button"  class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip"
                        title="Imagen seleccionada del producto">
                            <i class="material-icons">favorite</i>
                        </button>
                        @else
                        <a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}"   class="btn btn-primary btn-fab btn-fab-mini btn-round">
                            <i class="material-icons">favorite</i>
                        </a>   
                        @endif
                    </form>
                        </div>
                    </div>
                 </div>
              
                @endforeach
              </div>

            </div>

        </div>


        
    </div>

</div>

@include('includes.footer')

@endsection