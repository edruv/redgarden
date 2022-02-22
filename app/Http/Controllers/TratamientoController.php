<?php

namespace App\Http\Controllers;

use App\Tratamiento;
use App\TratamientosPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			$tratamientos = Tratamiento::all();
			return view('admin.tratamientos.index',compact('tratamientos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.tratamientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

      Validator::make($request->all(),[
          'nombre' => 'required',
					'precio' => 'required|numeric',
					'descuento' => 'nullable|numeric',
					'descripcion' => 'required',
					'url' => 'nullable|url',
				],[],[])->validate();

			$trat = new Tratamiento;

			$trat->nombre = $request->nombre;
			$trat->precio = $request->precio;
			$trat->descuento = $request->descuento;
			$trat->descripcion = $request->descripcion;
			$trat->url = $request->url;

			$trat->save();

			\Toastr::success('Guardado');
			return redirect()->route('tratamiento.show',$trat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento) {

			$tratamiento->gallery = $tratamiento->fotos()->orderBy('orden', 'asc')->get();

			return view('admin.tratamientos.show',compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tratamiento $tratamiento) {
			return view('admin.tratamientos.edit',compact('tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tratamiento $tratamiento) {

			Validator::make($request->all(),[
			    'nombre' => 'required',
					'precio' => 'required|numeric',
					'descuento' => 'nullable|numeric',
					'descripcion' => 'required',
					'url' => 'nullable|url',
				],[],[])->validate();

			$tratamiento->fill($request->all())->save();
			\Toastr::success('Guardado');
			return redirect()->route('tratamiento.show',$tratamiento->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tratamiento $tratamiento)
    {
        //
    }
}
