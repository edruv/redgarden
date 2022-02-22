<?php

namespace App\Http\Controllers;

use App\Producto;
use App\ProductosPhoto;
use App\ProductoMedida;
use App\Categoria;
use App\ProductoRelacion;
use App\ProductoSize;
use App\ProductoPresentacion;
use App\ProductoVariante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$products = Producto::orderBy('orden', 'asc')->get();

		foreach ($products as $prod) {
			$prod->categoria = Categoria::find($prod->categoria);
		}

		return view('admin.productos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
			$categParent = Categoria::where('parent',0)->get();
			return view('admin.productos.create',compact(['categParent']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
		$validate = Validator::make($request->all(), [
			'nombre' => 'required',
			'nombre_en' => 'required',
			'categoria' => 'required',
			// 'precio' => 'required',
			// 'descuento' => 'nullable',
			'descripcion' => 'required',
			'descripcion_en' => 'required',
		], [], [
			'nombre_en' => 'nombre (EN)',
			'descripcion_en' => 'descripcion (EN)',
		]);

		if ($validate->fails()) {
			\Toastr::error('Error, se requieren mas datos');
			return redirect()->back()->withErrors($validate);
		}

		$product = new Producto;

		$product->nombre = strtolower($request->nombre);
		$product->nombre_en = strtolower($request->nombre_en);
		$product->categoria = $request->categoria;
		// $product->precio = $request->precio;
		// $product->descuento = $request->descuento;
		$product->descripcion = $request->descripcion;
		$product->descripcion_en = $request->descripcion_en;

		$product->save();

		\Toastr::success('Guardado');
		return redirect()->route('productos.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto) {
  		$product = Producto::find($producto);

  		$product->categoria = Categoria::find($product->categoria);

  		$product->gallery = $product->fotos()->orderBy('orden', 'asc')->get();

  		$variantes = ProductoVariante::where('producto', $product->id)->get();

			$product->rel = $product->relacionados()->get()->pluck('otroProducto')->toArray();

			$productos = Producto::all();

  		if (empty($product)) {
  			\Toastr::error('Error al buscar, intente mas tarde');
  			return redirect()->back();
  		}

			$size = ProductoSize::all();
			$presentacion = ProductoPresentacion::all();

			foreach ($variantes as $var) {
				$var->size = ProductoSize::find($var->size);
				$var->presentacion = ProductoPresentacion::find($var->presentacion);
			}
  		// return $product;
  		return view('admin.productos.show', compact('product','productos','size','presentacion','variantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto) {
			$product = Producto::find($producto);
			$categParent = Categoria::all();

			return view('admin.productos.edit', compact('product','categParent'));
		}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto) {
  		$product = Producto::find($producto);

  		if (empty($product)) {
  			\Toastr::error('Error, no se encontro el producto a modificar');
  			return redirect()->back();
  		}

  		$validate = Validator::make($request->all(), [
				'nombre' => 'required',
				'nombre_en' => 'required',
				'categoria' => 'required',
				'descripcion' => 'required',
				'descripcion_en' => 'required',
			], [], [
				'nombre_en' => 'nombre (EN)',
				'descripcion_en' => 'descripcion (EN)',
			]);

  		if ($validate->fails()) {
  			\Toastr::error('Error, se requieren mas datos');
  			return redirect()->back()->withErrors($validate);
  		}

			$product->nombre = strtolower($request->nombre);
			$product->nombre_en = strtolower($request->nombre_en);
			$product->categoria = $request->categoria;
			// $product->precio = $request->precio;
			// $product->descuento = $request->descuento;
			$product->descripcion = $request->descripcion;
			$product->descripcion_en = $request->descripcion_en;

  		$product->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('productos.show', $product->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function updateimg(Request $request, $producto) {
  		$product = Producto::find($producto);

      if ($request->hasFile('portada') || $request->hasFile('medidas')) {
        $field = $request->type;
  			$file = $request->file($field);
  			$extension = $file->getClientOriginalExtension();
  			$namefile = Str::random(30) . '.' . $extension;

  			\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($file));

  			if (!empty($product->$field)) {
  				\Storage::disk('local')->delete("/img/photos/productos/" . $product->$field);
  			}

  			$product->$field = $namefile;
  		}

  		$product->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('productos.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

			if (empty($request->producto)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}

			$producto = Producto::find($request->producto);

			if (!empty($producto)) {

// NOTE: borrar tambien las variantes
// NOTE: eliminar fotos, portadas, etc

        $photos = ProductosPhoto::where('producto',$producto->id)->delete();

				$producto->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();

			}
    }
}
