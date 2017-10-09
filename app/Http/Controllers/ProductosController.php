<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Carbon\Carbon;
use DB;
use App\Http\Requests\RolesValidationProduct;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\Middleware\Authenticate;

class ProductosController extends Controller
{

    public function index()
    {
        //
        $productos = Producto::all()->where('status', '=', '1');        
        return view('producto.index', compact('productos'));   
    }

    public function create()
    {
        //
        return view('producto.create');
    }

    public function store(RolesValidationProduct $request)
    {
        $nombre = $request->input('nombre');
        Producto::create([
              "nombre"  =>  $request->input('nombre'),
              'precio'  =>  $request->input('precio'),
              'status'  =>  1
            ]);
        return redirect()
                ->route('producto.create')
                ->with('success','El Producto' .' ' .'<strong>'.$nombre.'</strong>'.' '. 'fue Agregado Correctamente!');
    }

    public function show()
    {
        $historial = DB::table('detalles')
                     ->join('producto' , 'producto.id', '=' , 'detalles.producto_id')
                     ->select('detalles.producto_id','detalles.cantidad', 'detalles.total', 'detalles.created_at', 'producto.nombre',  'producto.precio')          
                     ->get();    
         $totalProductos = 0;            
        for ($i=0; $i < count($historial) ; $i++) { 
                $totalProductos = $totalProductos + $historial[$i]->total;
        }
       return view('producto.showVentas', compact('historial', 'totalProductos'));
    }

    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        //
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('producto.index');
    }

    public function destroy($id)
    {
        //
        $producto = Producto::findOrFail($id);
        $producto->update([           
            "status" => 0,           
        ]);
        return back()->with('danger','El Producto' .' ' .'<strong>'.$producto->nombre.'</strong>'.' '. 'fue Eliminado Correctamente!');
    }
}
