<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // DB::select('select * from producto');
        // $products=DB::table('producto')->get();
        $productos=Productos::all();
        $title="Productos";
        return  view("productos.index")->with([
            'productos'=>$productos,
            'title'=>$title
        ]);
    }

    public function create(){
        
        return view("productos.create")->with([
            "title"=>"Productos"
        ]);
    }

    public function post(){
        // $from=request()->all();
        // dd($from);
        // dd(request()->codigo);

        $rules=[
            "codigo"=>["required"],
            "nombre"=>["required" , "max:255"],
            "gama"=>["required"],
            "dimensiones"=>["required" , "min:1"],
            "proveedor"=>["required" , "max:255"],
            "descripcion"=>["required" , "max:1000"],
            "stock"=>["required","numeric", "min:0"],
            "precio_venta"=>["required" ,"numeric", "min:1"],
            "precio_proveedor"=>["required" ,"numeric", "min:1"]
        ];

        request()->validate($rules);

        if (request()->codigo <> "") {
            Productos::create([
                "codigo_producto"=>request()->codigo,
                "nombre"=>request()->nombre,
                "gama"=>request()->gama,
                "dimensiones"=>request()->dimensiones,
                "proveedor"=>request()->proveedor,
                "descripcion"=>request()->descripcion,
                "cantidad_en_stock"=>request()->stock,
                "precio_venta"=>request()->precio_venta,
                "precio_proveedor"=>request()->precio_proveedor
                
            ]);
            // session()->forget("error");
            session()->flash("CreateElement","Elemento Creado Exitosamente");
            return  redirect(route("producto.index"));

        }else{
            // session()->put("error","Codigo de Producto Vacio");
            session()->flash("error","Codigo de Producto Vacio");
            return  redirect()->back();
        }
    }

    public function edit($id){
        // $producto=DB::select('select * from producto where codigo_producto ='.$id );
        // $producto=DB::table("producto")->where("codigo_producto",$id)->first();
        $producto=Productos::find($id);
        return view("productos.edit")->with([
            "title"=>"Productos",
            "producto"=>$producto,
        ]);
    }

    public function update($id){


        $rules=[
            "codigo"=>["required"],
            "nombre"=>["required" , "max:255"],
            "gama"=>["required"],
            "dimensiones"=>["required" , "min:1"],
            "proveedor"=>["required" , "max:255"],
            "descripcion"=>["required" , "max:1000"],
            "stock"=>["required", "min:0"],
            "precio_venta"=>["required" ,"numeric", "min:1"],
            "precio_proveedor"=>["required" ,"numeric", "min:1"]
        ];
        request()->validate($rules);

        $producto=Productos::find($id);
        $producto->nombre=request()->nombre;
        $producto->gama=request()->gama;
        $producto->dimensiones=request()->dimensiones;
        $producto->proveedor=request()->proveedor;
        $producto->descripcion=request()->descripcion;
        $producto->cantidad_en_stock=request()->stock;
        $producto->precio_venta=request()->precio_venta;
        $producto->precio_proveedor=request()->precio_proveedor;
        $producto->save();
        return  redirect(route("producto.index"));
    }

    public function delete($id){
        $producto=Productos::find($id);
        $producto->delete();
        return $producto;
    }

    
}
