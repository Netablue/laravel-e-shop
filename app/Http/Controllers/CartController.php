<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{    

    public function index()
    {
        return view('cart');
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
        \Cart::add($request->id, $request->name, $request->price, 1, array())->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success', 'Produit ajoute a votre panier');
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
        //
    }

    /**
     * Destroy function
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        \Cart::remove($id);

        return back()->with('success', 'Le produit a bien ete supprime du panier');
    }

    public function save($id)
    {
        $itemId = \Cart::get($id);
        
        \Cart::remove($id);

        // \Cart::instance('save')->add($itemId->id, $itemId->name, 1, $itemId->price)->associate('App\Models\Product');
        
        session_name('wishlist');

        return redirect()->route('cart.index')->with('succes', 'Product saved for later');
    }
}
