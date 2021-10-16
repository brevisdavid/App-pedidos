
@extends('layouts.app')
@section('body-class','product-page')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">
</div>

<div class="main main-raised">
    <div class="container"> 

        <div class="section ">
            <h2 class="title text-center">Registrar nuevo Categoría</h2>
             @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error)
                      <li>{{$error}}</li>  
                    @endforeach
                </ul>
             </div>
                 
             @endif
        
          <form method="post" action="{{url('/admin/categories')}}">
             {{ csrf_field() }}
           <div class="row">
             <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
             </div>
            </div>
             <textarea class="form-control" name="description" placeholder="Descripcion de la categoría" rows="5">
             {{old('description')}}
             </textarea>
             <button type="submit"  class="btn btn-success">Registrar categoría</button>
             <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
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
                