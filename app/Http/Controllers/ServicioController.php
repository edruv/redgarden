<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\ServiciosPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			$servicios = Servicio::orderBy('orden', 'asc')->get();

			return view('admin.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
			return view('admin.servicios.create');
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

			$servicio = new Servicio;

			$servicio->nombre = $request->nombre;
			$servicio->nombre_en = $request->nombre_en;
			$servicio->descripcion = $request->descripcion;
			$servicio->descripcion_en = $request->descripcion_en;

			$servicio->save();

			\Toastr::success('Guardado');
			return redirect()->route('servicio.show', $servicio->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio) {

  		$servicio->gallery = $servicio->fotos()->orderBy('orden', 'asc')->get();

  		if (empty($servicio)) {
  			\Toastr::error('Error al buscar, intente mas tarde');
  			return redirect()->back();
  		}
  		// return $servicio;
  		return view('admin.servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio) {
			return view('admin.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
			if (empty($servicio)) {
  			\Toastr::error('Error, no se encontro el producto a modificar');
  			return redirect()->back();
  		}

			$validate = Validator::make($request->all(), [
				'nombre' => 'required',
				'nombre_en' => 'required',
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

			$servicio->nombre = strtolower($request->nombre);
			$servicio->nombre_en = strtolower($request->nombre_en);
			$servicio->descripcion = $request->descripcion;
			$servicio->descripcion_en = $request->descripcion_en;

			$servicio->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('servicio.show', $servicio->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function updateimg(Request $request, $servicio) {
  		$product = Producto::find($servicio);

      if ($request->hasFile('portada') || $request->hasFile('medidas')) {
        $field = $request->type;
  			$file = $request->file($field);
  			$extension = $file->getClientOriginalExtension();
  			$namefile = Str::random(30) . '.' . $extension;

  			\Storage::disk('local')->put("/img/photos/servicios/" . $namefile, \File::get($file));

  			if (!empty($product->$field)) {
  				\Storage::disk('local')->delete("/img/photos/servicios/" . $product->$field);
  			}

  			$product->$field = $namefile;
  		}

  		$product->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('servicio.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
		 public function destroy(Request $request) {

 			if (empty($request->servicio)) {
 				\Toastr::error('Error, intentalo mas tarde');
 				return redirect()->back();
 			}

 			$servicio = Servicio::find($request->servicio);

 			if (!empty($servicio)) {

 // NOTE: borrar tambien las variantes
 // NOTE: eliminar fotos, portadas, etc

        $photos = ServiciosPhoto::where('servicio',$servicio->id)->delete();

 				$servicio->delete();
 				\Toastr::success('Eliminado Exitosamente');
 				return redirect()->back();
 			}
    }
}
