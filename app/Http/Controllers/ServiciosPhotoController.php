<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\ServiciosPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiciosPhotoController extends Controller
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
			$pic = new ServiciosPhoto;
			$ret = array();

			$error = $_FILES["uploadedfile"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData()
			if (!is_array($_FILES["uploadedfile"]["name"])) //single file
			{
				$fileName = $request->file('uploadedfile');
				$extension = $fileName->getClientOriginalExtension();
				$namefile = Str::random(30) . '.' . $extension;

				\Storage::disk('local')->put("/img/photos/servicios/" . $namefile, \File::get($fileName));

				$pic->image = $namefile;
				$pic->servicio = $request->servicio;

				$ret[] = $namefile;
			} else  //Multiple files, file[]
			{
				$fileCount = count($_FILES["uploadedfile"]["name"]);
				for ($i = 0; $i < $fileCount; $i++) {
					$fileName = $request->file('uploadedfile');
					$extension = $fileName->getClientOriginalExtension();
					$namefile = Str::random(30) . '.' . $extension;

					\Storage::disk('local')->put("/img/photos/servicios/" . $namefile, \File::get($fileName));

					$pic->image = $namefile;
					$pic->servicio = $request->servicio;

					$ret[] = $namefile;
				}
			}
			\Toastr::success('Guardado');
			$pic->save();

			echo json_encode($ret);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiciosPhoto  $serviciosPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ServiciosPhoto $serviciosPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiciosPhoto  $serviciosPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiciosPhoto $serviciosPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiciosPhoto  $serviciosPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiciosPhoto $serviciosPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiciosPhoto  $serviciosPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
			if (empty($request->photo)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}
			$photo = ServiciosPhoto::find($request->photo);

			if (!empty($photo)) {
				if (!empty($photo->image)) {
					\Storage::disk('local')->delete("/img/photos/servicios/" . $photo->image);
				}

				$photo->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();
				// return $color;
			}
    }
}
