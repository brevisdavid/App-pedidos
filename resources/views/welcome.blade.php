@extends('layouts.app')
@section('title','Bienvenido a '.config('app.name'))
<link rel="icon"href="../assets/img/iconoL.ico">
@section('body-class','landing-page')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/pajaro.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="title">Distribuidora de articulos de aseo y productos de limpieza.</h2>
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
                    <h2  class="title">Limpiazo confiabilidad</h2>
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
            <h2 class="title">Categorías disponibles</h2>
            <form action="{{url('/search')}}" method="get" class="form-inline">
                <input type="text" placeholder="¿Que productos buscas?" class="form-control" name="query" id="search">
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $item)
                        
                    
                    <div class="col-md-3">
                        <div class="team-player">
                             <img src="{{$item->featured_image_url}}" alt="Imagen representativa de la categoria {{$item->name}}" class="img-raised img-circle"> 
                            <h4 class="title">
                                <a href="{{url('/categories/'.$item->id)}}">{{$item->name}}</a>
                                <br/>
                                 <small class="text-muted">{{$item->category_name}}</small>
                            </h4>
                            <p style="font-size:16px;" class="description">{{$item->description}}</p>
                            <br/>
                        </div> 
                    </div>
                    @endforeach   
                </div> 
                    <div class="text-center">
                        {{-- {{$products->links()}}{{$detail->cantidad*$detail->product->price}} --}}
                    </div>               
                
            </div>

        </div>

        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Aún no te has registrado?</h2>
                    <h4 class="text-center description">Estas a solo dos paso para adquerir tus productos de forma segura en tu hogar. Estaremos atentos a tus dudas en nuestras redes sociales.</h4>
                    <form class="contact-form" method="GET" action="{{route('register')}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ingresa tu nombre</label>
                                    <input id="name" type="text" class="form-control"name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ingresa tu correo </label>
                                    <input id="email" type="email" class="form-control"name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary btn-raised">
                                     Registrar
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+56968437401", // WhatsApp number
            call_to_action: "Estamos disposición", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
@include('includes.footer')
@endsection
@section('scripts')
    <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
    <script>
        $(function(){
            var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch:'{{url("/products/json")}}'
         });
           // inicializamos typeahead sobre nuestro input de busqueda "
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },{
                name: 'products',
                source:products

        
            });  
         });
    </script>
@endsection