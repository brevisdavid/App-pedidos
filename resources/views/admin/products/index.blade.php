
@extends('layouts.app')
@section('body-class','product-page')
@section('title','Listado de Productos')
@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<div class="header header-filter" style="background-image: url('{{asset('img/limpio.png')}}');">
</div>
<div class="main main-raised">
    <div class="container">
        
        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>
           
            <div class="team">
                <div class="row">
                    <a href="{{url('/admin/products/create')}}"  class="btn btn-primary">Nuevo producto</a>
                    <table class="table table-striped" id="product">
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
                                   
                                    <form method="post" action="{{url('/admin/products/'.$product->id)}}" >
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                        <a href="{{url('/products/'.$product->id)}}" target="_blank"  type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('/admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-image btn-warning"></i>
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
                     {{-- {{$products->links()}}            --}}
                </div>
                
            </div>

        </div>
    </div>
    
</div>

@include('includes.footer')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script>
     $('#product').DataTable({
         responsive:true,
         autoWidth:false,
         "language": {
            "lengthMenu": "Mostrar " +`<select>
             <option value='10'>10</option>
             <option value='25'>25</option>
             <option value='50'>50</option>
             <option value='100'>100</option>
             <option value='-1'>all</option>
             </select>`
             + " Registro de Productos",
            "zeroRecords": "No hay registro del producto",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "search":"Buscar",
            "paginate":{
            "next":"Siguiente",
            "previous":"Anterior"
            }
        }
     });
</script>
@endsection
{{-- +`<input type="text" class="form form-control"style="margin-botton: 50px;">`
<input type="text" style="margin-top:5px" style="margin-left: 20px"> --}}