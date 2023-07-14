<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']); // Middleware que requiere autenticación para acceder a los métodos del controlador
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.collection'); // Retorna una vista para mostrar una colección en el panel de administración
    }

    public function allConcertsTotalSales()
    {
        $concerts = Concert::withSum('detailOrder', 'total')->get(); // Obtiene una lista de conciertos con la suma total de ventas utilizando el modelo Concert y el método withSum()
        return response()->json($concerts); // Retorna una respuesta JSON con los conciertos y sus ventas totales
    }

    public function allDetailOrders()
    {
        $detail_orders = DetailOrder::all(); // Obtiene todos los registros del modelo DetailOrder
        return response()->json($detail_orders); // Retorna una respuesta JSON con todos los registros de pedidos detallados
    }
}
