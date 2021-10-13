@extends('layouts.app')
@section('title','Bienvenido a Limpiazo')
@section('body-class','landing-page')
@section('styles')
<style>
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
<div class="header header-filter" style="background-image: url('{{asset('img/pajaro.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="title">Bienvenido a nuestra empresa utiles de aseo.</h2>
                <h4>Realizar pedidos en linea para gestionar las entregas de los productos a domicilio</h4>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> Como funciona
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">Limpiazo confiabilidad</h2>
                    <h5 class="description">Puedes comparar precios elegir productos hacer pedidos cuando estes seguro</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Estamos atento a tus dudas</h4>
                            <p>Cualquier duda la responderemos en cualquiera de nuestras redes sociales,
                            no estas solo siempre estaremos comprometidos a dar una solucion a tus inquitudes.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Todos los pedidos seran recepcionados personalmente por llamada y confimación por correo electrónico para una mejor atencion,
                                 los pagos se realizaran una ves concretado las entregas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Información privada</h4>
                            <p>Los pedidos que realices solo tu los veras en tu panel de usuario. Nadie mas tendrá acceso a tu información</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>

            <div class="team">
                <div class="row">
                    @foreach ($products as $item)
                        
                    
                    <div class="col-md-4">
                        <div class="team-player">
                             <img src="{{$item->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle"> 
                            <h4 class="title">
                                <a href="{{url('/products/'.$item->id)}}">{{$item->name}}</a>
                                <br/>
                                 <small class="text-muted">{{--{{$product->category->name}}{{$item->category ? $item->category ->name :'General'}}--}}</small> 
                            </h4>
                            <p class="description">{{$item->description}} <a href="#"></a></p>
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

        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Aun no te has registrado</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Name</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Your Messge</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection