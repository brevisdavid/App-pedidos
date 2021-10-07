
@extends('layouts.app')
@section('title','Chanchito | Dashboard')
@section('body-class','product-page')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">

</div>

<div class="main main-raised">
    <div class="container"> 

        <div class="section ">
            <h2 class="title text-center">Dashboard</h2>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li>
                        <a href="#dashboard" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>
                    
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                            
                
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
                
