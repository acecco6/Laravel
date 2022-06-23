@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection

@section('body')
    <div>
        <h1>Edit Product</h1>
    </div>

    {{-- @dump( $errors ) --}}
    
    @if (isset($errors) && $errors->any() )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>    
    @endif

    <form method="POST" action={{ route("producto.update",["id"=>$producto->codigo_producto]) }}>
        @csrf
        @method("PUT")
        <div>
            <label for="codigo">Codigo Producto</label>
            <input value={{ $producto->codigo_producto }} type="text" name="codigo" readonly>
        </div>
        

        <div>
            <label for="nombre">Nombre</label>
            <input value={{ $producto->nombre }} type="text" name="nombre" >
        </div>
        

        <div>
            <label for="gama">Gama</label>
            <input value={{ $producto->gama }} type="text" name="gama" >
        </div>
        

        <div>
            <label for="dimensiones">Dimensiones</label>
            <input value={{ $producto->dimensiones }} type="decimal" name="dimensiones" >
        </div>
        

        <div>
            <label for="proveedor">Proveedor</label>
            <input value={{ $producto->proveedor }} type="text" name="proveedor" >
        </div>
        

        <div>
            <label for="descripcion">Descripcion</label>
            <textarea value={{ $producto->descripcion }}  name="descripcion" >{{ $producto->descripcion }}</textarea>
        </div>
        

        <div>
            <label for="stock">Stock</label>
            <input value={{ $producto->cantidad_en_stock }} type="number" name="stock" >
        </div>
        

        <div>
            <label for="precio_venta">Precio Venta</label>
            <input value={{ $producto->precio_venta }} type="number" name="precio_venta" >
        </div>
        

        <div>
            <label for="precio_proveedor">Precio Proveedor</label>
            <input value={{ $producto->precio_proveedor }} type="number" name="precio_proveedor" >
        </div>
        

        <button type="submit">Editar</button>

    </form>
@endsection

    