<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutesController extends Controller
{
	public function edit($id = null) {

		$route     = DB::table( 'routes' )
		               ->where( 'routes.id', '=', $id )
		               ->select( 'routes.number as number', 'routes.name as name', 'routes.id' )
		               ->first();
		$customers = DB::table( 'customers' )
		               ->where( 'customers.route_id', '=', $id )
		               ->select( 'customers.id', 'customers.name', 'customers.address' )
		               ->orderBy( 'route_order', 'asc' )
		               ->get();
		return view('routes.edit-route', compact('route', 'customers', 'id'));
	}

	public function update(Request $request) {

		dd($request->ajax());

//		dd($request->all());
//		dd($request->input('order'));
//		echo json_encode(\response($request->order));
//		dd(response()->json($request->get('order')));
//		echo $_POST['order'];

//		return response()->json(array( 'success' => true, 'order' => $request->post('order')), 200, array( 'allow origin' => 'Access-Control-Allow-Origin'));

	}

}
