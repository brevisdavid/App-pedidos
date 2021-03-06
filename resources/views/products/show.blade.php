@extends('layouts.app') 
@section('title','Distribuidora| Limpiazo') 
@section('body-class','profile-page')
@section('content') 
    <div class="header header-filter" style="background-image: url('https://cdn.pixabay.com/photo/2016/03/30/16/49/putz-bucket-1290951_960_720.jpg');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{$product->featured_image_url}}" alt="Circle Image" class="img-circle img-responsive img-raised">
                        </div>
                       
                        <div class="name">
                            <h3 class="title">{{$product->name}}
                            <p style="color:#2323BF">$ {{$product->price}}</p>
                            </h3>
                            <h6>{{$product->category->name}}</h6>
                        </div>
                        @if (session('exito'))
                        <div class="alert alert-success" role="alert">
                            {{ session('exito') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$product->long_description}}</p>
                </div>
                <div class="text-center">
                @if (auth()->check())
                <button class="btn btn-primary btn-round"data-toggle="modal" data-target="#modalAddToCar">
                    <i class="material-icons">add_shopping_cart</i> Añadir al carrito
                </button> 
                <a href="{{url('/')}}" class="btn btn-info btn-round">
                    <i class="material-icons">undo</i> Seguir comprando
                </a> 
                <a href="/home" class="btn btn-round">
                <i class="material-icons">shopping_cart</i> Ver tú carrito</a>
                   
                @else
                <a href="{{url('/login?redirect_to='.url()->current())}}" class="btn btn-primary btn-round">
                    <i class="material-icons">add_shopping_cart</i> Añadir al carrito
                </a>
                @endif

          {{--       <a href="{{url('/')}}" class="btn btn-info btn-round">
                    <i class="material-icons">undo</i> Seguir comprando
                </a> 
                <a href="/home" class="btn btn-round">
                <i class="material-icons">shopping_cart</i> Ver tú carrito</a> --}}  
                </div>

 
                  
                 <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="profile-tabs">
                        
                            <div class="nav-align-center">
                                
                                <div class="tab-content gallery">
                                    <div class="tab-pane active" id="studio">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @foreach ($imagesLeft as $image)
                                                <img src="{{$image->url}}" class="img-rounded" />
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                @foreach ($imagesRight as $image)
                                                <img src="{{$image->url}}" class="img-rounded" />
                                                @endforeach
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile Tabs -->
                    </div>
                </div> 

            </div>
        </div>
    </div>
     <div class="modal fade" id="modalAddToCar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
      </div>



@include('includes.footer')

@endsection
