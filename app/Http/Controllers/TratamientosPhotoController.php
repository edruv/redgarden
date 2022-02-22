<?php

namespace App\Http\Controllers;

use App\TratamientosPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TratamientosPhotoController extends Controller
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
			$pic = new TratamientosPhoto;
			$ret = array();

			$error = $_FILES["uploadedfile"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData()
			if (!is_array($_FILES["uploadedfile"]["name"])) //single file
			{
				$fileName = $request->file('uploadedfile');
				$extension = $fileName->getClientOriginalExtension();
				$namefile = Str::random(30) . '.' . $extension;

				\Storage::disk('local')->put("/img/photos/tratamientos/" . $namefile, \File::get($fileName));

				$pic->image = $namefile;
				$pic->tratamiento = $request->tratamiento;

				$ret[] = $namefile;
			} else  //Multiple files, file[]
			{
				$fileCount = count($_FILES["uploadedfile"]["name"]);
				for ($i = 0; $i < $fileCount; $i++) {
					$fileName = $request->file('uploadedfile');
					$extension = $fileName->getClientOriginalExtension();
					$namefile = Str::random(30) . '.' . $extension;

					\Storage::disk('local')->put("/img/photos/tratamientos/" . $namefile, \File::get($fileName));

					$pic->image = $namefile;
					$pic->tratamiento = $request->tratamiento;

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
     * @param  \App\TratamientosPhoto  $tratamientosPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(TratamientosPhoto $tratamientosPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TratamientosPhoto  $tratamientosPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(TratamientosPhoto $tratamientosPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TratamientosPhoto  $tratamientosPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TratamientosPhoto $tratamientosPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TratamientosPhoto  $tratamientosPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(TratamientosPhoto $tratamientosPhoto) {
			if (empty($request->tratamiento)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}
			$photo = ProductosPhoto::find($request->tratamiento);

			if (!empty($photo)) {
				if (!empty($photo->image)) {
					\Storage::disk('local')->delete("/img/photos/tratamientos/" . $photo->image);
				}

				$photo->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();
				// return $color;
			}
    }
}
