<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $carts = Cart::with('products')->get();
        // dd($carts);
        $total = Cart::join('products', 'carts.products_id', '=', 'products.id')
            ->sum(DB::raw('carts.qty * products.price'));
        return view('be.pages.cart.index',compact('carts','products','total'));
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
        $validated = $request->validate([
            'products_id'   => 'required',
            'qty'           => 'required|integer'
        ]);
        $cek = Cart::where('products_id',$request->products_id)->first();
        if($cek){
            Cart::where('id',$cek->id)->update(['qty'=>$cek->qty + $request->qty]);
        }else{
            Cart::create($validated);
        }
        return redirect('cart');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart -> update([
            'qty' => $request-> qty,
        ]);
        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Cart::find($id);
        $deleted->delete();
        return back();
    }
}
