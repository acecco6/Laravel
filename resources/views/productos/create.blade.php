@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection

@section('body')
    <div>
        <h1>Create Product</h1>
    </div>

    {{-- @dump( $errors ) --}}
    @if (isset($errors) && $errors->any() )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>    
    @endif

    @if (session()->has("error"))
        <div class="alert alert-danger">
            {{session()->get("error")}}
        </div>    
    @endif
    
    <form method="POST" action={{ route("producto.post") }}>
        @csrf
        <div>
            <label for="codigo">Codigo Producto</label>
            <input type="number" name="codigo" value={{ old("codigo") }} >
        </div>
        

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value={{ old("nombre") }} >
        </div>
        

        <div>
            <label for="gama">Gama</label>
            <input type="text" name="gama" value={{ old("gama") }} >
        </div>
        

        <div>
            <label for="dimensiones">Dimensiones</label>
            <input type="number" name="dimensiones" value={{ old("dimensiones") }} >
        </div>
        

        <div>
            <label for="proveedor">Proveedor</label>
            <input type="text" name="proveedor" value={{ old("proveedor") }} >
        </div>
        

        <div>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" value={{ old("descripcion") }} >
        </div>
        

        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" value={{ old("stock") }} >
        </div>
        

        <div>
            <label for="precio_venta">Precio Venta</label>
            <input type="number" name="precio_venta" value={{ old("precio_venta") }} >
        </div>
        

        <div>
            <label for="precio_proveedor">Precio Proveedor</label>
            <input type="number" name="precio_proveedor" value={{ old("precio_proveedor") }} >
        </div>
        

        <button type="submit">Crear</button>

    </form>
@endsection

    