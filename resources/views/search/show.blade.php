@extends('layouts.app') 
@section('title','Resultados de búsqueda') 
@section('body-class','profile-page')
@section('styles')
    <style>
      .team{
       padding-bottom: 50px;
    
      .team.row.col-md-4{
         margin-bottom: 5em;
     } 
       .row{
         display: -webkit-flex;
         display: -webkit-box;
         display: -ms-flexbox;
         display: flex;
         flex-wrap: wrap;
     }  
     .row >[class*='col-']{
         display: flex;
         flex-direction: column;
     } 
    </style>   
@endsection
@section('content') 
    <div class="header header-filter" style="background-image: url('https://cdn.pixabay.com/photo/2016/03/30/16/49/putz-bucket-1290951_960_720.jpg');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar ">
                            <img src="/img/search.png" alt="Imagen de la busqueda representa una lupa" class="img-circle img-responsive img-raised">
                        </div>
                       
                        <div class="name">
                            <h3 class="title">Resultado de la busqueda</h3>
                        </div>

                        @if (session('exito'))
                        <div class="alert alert-success" role="alert">
                            {{ session('exito') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="description text-center">
                    <p>Se encontraron {{$products->count()}} resultados para el termino {{$query}}</p>
                </div>
                <div class="team text-center">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="team-player">
                                 <img src="{{ $product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle"> 
                                <h4 class="title">
                                    <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>
                                    <br/>
                                     {{-- <small class="text-muted">{{$product->category_name}}</small>  --}}
                                </h4>{{--{{$product->category->name}}{{$item->category ? $item->category ->name :'General'}}{{$item->price}}--}}
                                <p class="description">{{$product->description}}</p>
                            </div> 
                        </div>
                        @endforeach   
                    </div> 
                        <div class="text-center">
                            {{$products->links()}}
                        </div>               
                    
                </div>
                 

            </div>
        </div>
    </div>
    {{--  <div class="modal fade" id="modalAddToCar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Seleccione cantidad que desea llevar </h4>
            </div>
            <form action="{{url('/cart')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="modal-body">
                <input type="number" name="cantidad" value="1" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-info btn-simple">Añadir a la compra</button>
            </div>
          </form>
          </div>
        </div>
      </div>--}}



@include('includes.footer')

@endsection
