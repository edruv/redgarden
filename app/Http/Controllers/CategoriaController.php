<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$cats = Categoria::where('parent',0)->orderBy('orden','asc')->get();
			// foreach ($cats as $cat) {
			// 	$cat->sub = Categoria::where('parent',$cat->id)->count();
			// 	$cat->prods = Producto::where('categoria',$cat->id)->count();
			// }
			return view('admin.categorias.index',compact('cats'));
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
    public function store(Request $request)
    {
			$cat = new Categoria;

			$slug = $request->nombre_en ;

			$cat->nombre = $request->nombre;
			$cat->nombre_en = $request->nombre_en;
			$cat->slug = Str::slug($slug);
			$cat->save();

			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($categoria) {
			$categ = Categoria::find($categoria);
			return view('admin.categorias.show',compact('categ'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categ) {
			return view('admin.categorias.edit',compact('categ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categ) {

			$slug = $request->nombre_en ;

			$categ->nombre = $request->nombre;
			$categ->nombre_en = $request->nombre_en;
			$categ->slug = Str::slug($slug);
			$categ->save();

			return view('admin.categorias.show',compact('categ'));
    }

		public function updateimg(Request $request, $categoria) {
  		$product = Categoria::find($categoria);

      if ($request->hasFile('portada')) {
        $field = $request->type;
  			$file = $request->file($field);
  			$extension = $file->getClientOriginalExtension();
  			$namefile = Str::random(30) . '.' . $extension;

  			\Storage::disk('local')->put("/img/photos/categorias/" . $namefile, \File::get($file));

  			if (!empty($product->$field)) {
  				\Storage::disk('local')->delete("/img/photos/categorias/" . $product->$field);
  			}

  			$product->$field = $namefile;
  		}

  		$product->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('categ.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
			if (empty($request->categoria)) {
				\Toastr::error('No se encontro la categoria, intente mas tarde');
				return redirect()->back();
			}

			$cat = Categoria::find($request->categoria);

			if (Producto::where('categoria',$cat->id)->count()) {
				\Toastr::error('No se puede eliminar una categoria con productos');
				return redirect()->back();
				// return redirect()->route('categ.index');
			}

			$cat->delete();

			\Toastr::success('Eliminado exitosamente');
			return redirect()->back();
    }
}
