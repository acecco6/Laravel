@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('css/producto.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection

@section('body')
    <div style="margin-top:23px !important;" class="container-xxl">
        
        @if (session()->has("CreateElement"))
            <div class="alert alert-success" id="modal_succes" role="alert">
                {{ session()->get("CreateElement") }}
            </div>
        @endif

        <div class="alert alert-secondary" role="alert">
            {{ $title }}
        </div>
        
        <div class="alert alert-primary" role="alert">
            <a href="{{ route("producto.create") }}"><button class="btn btn-dark">Create Product</button></a>
        </div>
    
        <table class="table table-success  table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>gama</th>
                    <th>dimensiones</th>
                    <th>proveedor</th>
                    <th>cantidad en stock</th>
                    <th>precio venta</th>
                    <th>precio proveedor</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($productos as $producto ) { ?>    
                    <tr>
                        <td> {{ $producto->codigo_producto ; }} </td>
                        <td> {{ $producto->nombre; }} </td>
                        <td> {{ $producto->gama; }} </td>
                        <td> {{ $producto->dimensiones; }} </td>
                        <td> {{ $producto->proveedor; }} </td>
                        <td> {{ $producto->cantidad_en_stock; }} </td>
                        <td> ${{ $producto->precio_venta; }} </td>
                        <td> ${{ $producto->precio_proveedor; }} </td>    
                        <th>
                            <form action="{{ route("producto.edit",["id"=>$producto->codigo_producto]) }}" method="get">
                                @csrf
                                <button class="btn btn-warning">Editar</button> 
                            </form>
                            <br>
                            <button class="btn btn-danger" data-id="{{$producto->codigo_producto ;}}" onclick=borrar(this)>Eliminar</button>
                        </th>
                    </tr>       
                <?php }  ?>
                
            </tbody> 
        </table>
    </div>  

    <div class="modal_delete">
        <div>
            Se elimino correctamente
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/producto.js')}}"></script>
@endsection

    