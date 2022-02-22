<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\Elemento;
use App\Carrusel;
use App\Producto;
use App\ProductosPhoto;
use App\ProductoVariante;
use App\ProductoSize;
use App\ProductoPresentacion;
use App\Servicio;
use App\ServiciosPhoto;
use App\Politica;
use App\Faq;
use App\Categoria;
use App\Configuracion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Collection;
use Session;
use View;

class FrontController extends Controller
{
	protected $envar;

	public function __construct(){
		if (!Session::get('lang')) {
			Session::put('lang', 'es');
		}
		// $this->envar = (Session::get('lang') == 'en' ) ? '_en' : '' ;
		// View::share('envar', $this->envar);

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
		public function index(){
			$carrusel = Carrusel::orderBy('orden','asc')->get();

			foreach ($carrusel as $carru) {
				if ($carru->video) {
					if (Str::contains($carru->video, 'v=')) {
						$pos=strpos($carru->video, 'v');
						$videoPhoto=substr($carru->video, ($pos+2));
					}

					if (Str::contains($carru->video, 'youtu.be')) {
						$pos=strrpos($carru->video, '/');
						$videoPhoto=substr($carru->video, ($pos+1));
					}

					$carru->video = [
						'url' => $carru->video,
						'idVideo' => $videoPhoto
					];
				}
			}

			$envar = (Session::get('lang') == 'en') ? 1 : 0 ;
			$elements = Elemento::where('seccion',1)->where('en',$envar)->get();
			// $elements = Elemento::where('seccion',1)->get();
			// return view('front.index',compact('elements'));
			$desta = Producto::where('activo',1)->where('inicio',1)->get();
			foreach ($desta as $dest) {
				$photo = ProductosPhoto::where('producto',$dest->id)->orderBy('orden', 'asc')->get()->first();
				$dest->photo = (!empty($photo)) ? $photo['image'] : null ;
				// $prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
			}
			$servDesta = Servicio::where('activo',1)->where('inicio',1)->get();
			foreach ($servDesta as $dest) {
				$photo = ServiciosPhoto::where('servicio',$dest->id)->orderBy('orden', 'asc')->get()->first();
				$dest->photo = (!empty($photo)) ? $photo['image'] : null ;
			}

			return view('front.index',compact('carrusel','elements','desta','servDesta'));
	}

		/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function contacto(){
		$seccion = Seccion::find(4);
		$envar = (Session::get('lang') == 'en') ? 1 : 0 ;

		$elements = Elemento::where('seccion', $seccion->id)->where('en',$envar)->get();

		return view('front.contacto',compact('elements'));
	}

	public function detailsdemo(){
		return view('front.detalle');
	}

	public function productos($slug = null){
		// $products = Producto::where('activo',1)->get();
		$products = Producto::where('activo',1);

		if (!empty($slug)) {
			$catslug = Categoria::where('slug',$slug)->get()->first();
			$products->where('categoria',$catslug->id);
		}

		$products = $products->get();
		// return $products->get();

		$cats = Categoria::all();

		$seccion = Seccion::find(2);
		$envar = (Session::get('lang') == 'en') ? 1 : 0 ;

		$elements = Elemento::where('seccion', $seccion->id)->where('en',$envar)->get();

		foreach ($products as $prod) {
			$photo = ProductosPhoto::where('producto',$prod->id)->orderBy('orden', 'asc')->get()->first();
			$prod->photo = (!empty($photo)) ? $photo['image'] : null ;
			// $prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
		}

		return view('front.tienda',compact('products','cats','elements','slug'));
		// return $data;
		// return $products;
	}

	// public function productos(Request $request){
	// 	$products = Producto::where('activo',1);
	// 	$cats = Categoria::where('parent',0)->get();
	//
	// 	if (!empty($cat)) {
	// 			if ($cat->parent == 0 ) {
	// 				$catsProd = Categoria::where('parent',$cat->id)->get();
	// 				$products->whereIn('categoria',$catsProd->pluck('id'));
	// 			} else {
	// 				$catsProd = Categoria::where('parent',$cat->parent)->get();
	// 				$products->where('categoria',$cat->id);
	// 				// $catsProd = null;
	// 			}
	// 		} else {
	// 			$catsProd = null;
	// 		}
	//
	// 	foreach ($products as $prod) {
	// 		$fphoto = ProductosPhoto::where('producto',$prod->id)->orderBy('orden','ASC')->get()->first();
	// 		$prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
	// 	}
	//
	// 	if ($request->ajax()) {
	// 		$products = Producto::where('activo',1)->orderBy('orden','asc')->paginate(4);
	// 		foreach ($products->items() as $prod) {
	// 			$photo = ProductosPhoto::where('producto',$prod->id)->orderBy('orden', 'asc')->get()->first();
	// 			$prod->photo = ($photo) ? $photo->image : null ;
	// 		}
	// 		return $products;
	// 	}
	//
	// 	return view('front.tienda',compact('products','cats','catsProd'));
	// 	// return $data;
	// }

	public function details(Producto $product){
		// $product = Producto::find($producto);

		$product->categoria = Categoria::find($product->categoria);

		$product->gallery = $product->fotos()->orderBy('orden', 'asc')->get();

		$variantes = ProductoVariante::where('producto', $product->id)->get();
		// $variantes = ProductoVariante::where('producto', $product->id)->groupBy('size')->get();

		foreach ($variantes as $var) {
			$var->size = ProductoSize::find($var->size);
			$var->presentacion = ProductoPresentacion::find($var->presentacion);
		}

		$relacionados = $product->relacionados;
		$prodRel = collect();
		foreach ($relacionados as $rel) {
			$prod = Producto::find($rel->otroProducto);
			$photo = ProductosPhoto::where('producto',$prod->id)->orderBy('orden', 'asc')->get()->first();
			$prod->photo = (!empty($photo)) ? $photo['image'] : null ;

			$prodRel->push($prod);
		}
		// $medidas = ProductoMedida::where('producto',$product->id)->orderBy('orden', 'asc')->get();
		// return view('front.detalles', compact('product','variantes','productos_rel','elements'));
		// return response()->json($data);
		return view('front.tienda_detalle', compact('product','variantes','prodRel'));
		// return $product;
	}

	public function servicios() {

		$services = Servicio::where('activo',1)->get();

		foreach ($services as $serv) {
			$photo = ServiciosPhoto::where('servicio',$serv->id)->orderBy('orden', 'asc')->get()->first();
			$serv->photo = (!empty($photo)) ? $photo['image'] : null ;
		}

		return view('front.servicios',compact('services'));
	}

	public function servicioDet(Servicio $serv) {
		$serv->gallery = $serv->fotos()->orderBy('orden', 'asc')->get();
		return view('front.servicio_detalle',compact('serv'));
	}

	public function aboutus(){
		$seccion = Seccion::find(3);
		$envar = (Session::get('lang') == 'en') ? 1 : 0 ;

		$elements = Elemento::where('seccion', $seccion->id)->where('en',$envar)->get();

		return view('front.aboutus', compact('elements', 'seccion',));
		// return view('front.aboutus');
	}
	public function garantias(){
		$politica = Politica::find(5);
		return view('front.politicas',compact("politica"));
	}

	public function aviso(){
		$politica = Politica::find(1);
		return view('front.politicas',compact("politica"));
	}

	public function pagos(){
		$politica = Politica::find(2);
		return view('front.politicas',compact("politica"));
	}

	public function devoluciones(){
		$politica = Politica::find(3);
		return view('front.politicas',compact("politica"));
	}

	public function tyc(){
		$politica = Politica::find(4);
		return view('front.politicas',compact("politica"));
	}

	public function preguntas(){
		$preguntas = Faq::all();
		return view('front.faq',compact("preguntas"));
	}

	// correo de contacto normal
	public function mailcontact(Request $request){
		$validate = Validator::make($request->all(),[
			'nombre' => 'required',
			'empresa' => 'nullable',
			'ciudad' => 'nullable',
			'correo' => 'required',
			'telefono' => 'required|numeric',
			'mensaje' => 'nullable',
		],[],[]);



		if ($validate->fails()) {
			\Toastr::error('Error, se requieren todos datos');
			return redirect()->back();
		}

		$data = array(
			'nombre' => $request->nombre,
			'empresa' => $request->empresa,
			'ciudad' => $request->ciudad,
			'correo' => $request->correo,
			'telefono' => $request->telefono,
			'mensaje' => $request->mensaje,
			'asunto' => 'Formulario de contacto',
			'hoy' => Carbon::now()->format('d-m-Y')
		);

		$html = view('front.mailcontact',compact('data'));

		$config = Configuracion::first();

		$mail = new PHPMailer;
		$mail->isSMTP();
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->Host = $config->remitentehost;
		$mail->Port = $config->remitenteport;
		$mail->SMTPAuth = true;
		$mail->Username = $config->remitente;
		$mail->Password = $config->remitentepass;
		$mail->SMTPSecure = $config->remitenteseguridad;
		$mail->SetFrom($config->remitente, $config->title);
		$mail->isHTML(true);

		$mail->addAddress($config->destinatario,$config->title);
		if (!empty($config->destinatario2)) {
			$mail->AddBCC($config->destinatario2,$config->title);
		}
		$mail->Subject = $data['asunto'];
		$mail->msgHTML($html);
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


		if ($mail->send()) {
			\Toastr::success('Correo enviado Exitosamente!');
			return redirect()->back();
		} else {

			\Toastr::error('No se ha podido enviar el correo/ '. $mail->ErrorInfo);
			return redirect()->back();
		}
	}

}
