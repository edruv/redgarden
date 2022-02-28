<?php

namespace App\Http\Controllers;

use App\Producto;
use App\ProductoVariante;
use App\ProductoSize;
use App\ProductoPresentacion;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoVarianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
			$validate = Validator::make($request->all(), [
				'producto' => 'required',
				'size' => 'required',
				'presentacion' => 'required',
				'stock' => 'required',
				'precio' => 'required',
				'descuento' => 'nullable',

			], [], []);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}

			$variant = new ProductoVariante;

			$variant->producto = $request->producto;
			$variant->size = $request->size;
			$variant->presentacion = $request->presentacion;
			$variant->stock = $request->stock;
			$variant->precio = $request->precio;
			$variant->descuento = $request->descuento;

			$variant->save();

			\Toastr::success('Guardado');
			return redirect()->route('productos.show', $request->producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function show($productoVariante) {
			$var = ProductoVariante::find($productoVariante);
			$product = Producto::find($var->producto);
			$product->categoria = Categoria::find($product->categoria);
			$size = ProductoSize::find($var->size);
			$presentacion = ProductoPresentacion::find($var->presentacion);

			switch ($var->tipo_envio) {
				case 'envelope':
					$var->tipo_envio = 'Sobre';
				break;
				case 'pallet':
					$var->tipo_envio = 'Tarima';
				break;
				case 'full_truck_load':
					$var->tipo_envio = 'Camión';
				break;
				case 'box':
					$var->tipo_envio = 'Paquete';
				break;
			}

			return view('admin.variantes.show',compact('var','product','size','presentacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function edit($productoVariante) {

			$variante = ProductoVariante::find($productoVariante);
			$size = ProductoSize::all();
			$presentacion = ProductoPresentacion::all();
			if (empty($variante)) {
				\Toastr::error('Error, no se encontro el producto');
				return redirect()->back();
			}

			return view('admin.variantes.edit',compact('variante','size','presentacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productoVariante) {
			$variant = ProductoVariante::find($productoVariante);
			$validate = Validator::make($request->all(), [
				'precio' => 'required',
				'tipo_envio' => 'required',
				'peso' => 'required',
				'largo' => 'required',
				'ancho' => 'required',
				'alto' => 'required',
			], [], [
				'tipo_envio' => 'tipo de envio',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}

			if (empty($variant)) {
				\Toastr::error('Error, no se encontro el producto');
				return redirect()->back()->withErrors($validate);
			}

			$variant->size = $request->size;
			$variant->presentacion = $request->presentacion;
			$variant->stock = $request->stock;
			$variant->precio = $request->precio;
			$variant->descuento = $request->descuento;
			$variant->tipo_envio = $request->tipo_envio;
			$variant->peso = $request->peso;
			$variant->largo = $request->largo;
			$variant->ancho = $request->ancho;
			$variant->alto = $request->alto;

			$variant->save();

			\Toastr::success('Guardado');
			return redirect()->route('productos.variantes.show', $variant->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoVariante $productoVariante)
    {
        //
    }
}
