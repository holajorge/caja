<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Detalles;
use Carbon\Carbon;
use DB;
class ComprasController extends Controller
{

    public function index()
    {
        //
        $productos = Producto::all()->where('status', '=', '1');

        return view('compras.index' , compact('productos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
       // $compras =  dd($request->input('cantidad'));

        for ($i=0; $i < count($request->producto_id); $i++) { 
            # code...
            $data = array(
                'producto_id' => $request->producto_id[$i],
                'cantidad' => $request->cantidad[$i],
                'total' => $request->total[$i]                
            );  
            Detalles::create($data);           
        }
        return redirect()->route('compra.index');

        // foreach ($request->cantidad as $key => $value) {
        //     # code...
        //     $data = array(
        //         'producto_id' => $request->producto_id[$key],
        //         'cantidad' => $request->cantidad[$key],
        //         'total' => $request->total[$key],
                
        //     );
         
        //     Detalles::create($data);
        // }
        
    }

    public function show()
    {
        //    
        $historial = DB::table('detalles')
                     ->join('producto' , 'producto.id', '=' , 'detalles.producto_id')
                     ->select('detalles.producto_id','detalles.cantidad', 'detalles.total', 'detalles.created_at', 'producto.nombre',  'producto.precio')          
                     ->get();       
        return view('compras.historial', compact('historial'));

    }

    public function edit($id)
    {
        //

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
