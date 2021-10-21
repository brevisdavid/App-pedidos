<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\NewOrder;
use Mail;
class CartController extends Controller
{
    
    
    public function update()
    {
     $client=auth()->user();
     $cart=$client->cart;
     $cart->status='Pending';
     $cart->fecha_pedido=Carbon::now();
     $cart->save();//update
     $admins=User::where('admin',true)->get();
     Mail::to($admins)->send(new NewOrder($client,$cart));

     $notificacion='Tu pedido se ha registrado correctamente. Te contactaremos por email ';
     return back()->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
