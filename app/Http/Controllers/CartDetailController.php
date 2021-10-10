<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartDetail;

class CartDetailController extends Controller
{
   

    public function store(Request $request)
    {
        $cartDetail=new CartDetail();
        $cartDetail->cart_id= auth()->user()->cart->id;
        $cartDetail->product_id= $request->product_id;
        $cartDetail->cantidad= $request->cantidad;
        $cartDetail->save();
        $exito='El producto se a cargado correctamente a tu carito';
        return back()->with(compact('exito'));
     
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

   
    public function destroy(Request $request)
    {
        $cartDetail=CartDetail::find($request->cart_detail_id);
        if ( $cartDetail->cart_id==auth()->user()->cart->id) 
        $cartDetail->delete();
        $notificacion=' El producto a sido eliminado exitosamente';
        return back()->with(compact('notificacion'));   
    }
   
}
