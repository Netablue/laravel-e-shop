<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrdersController extends Controller
{
    /**
     * 
     * Git bug
     * 
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        return view('orders', [
            'orders' => $user->order,               
        ]);
    }

    public function createPdf($id)
    {

        $order = Order::where('id', $id)->firstOrfail();
        // $product = OrderProduct::where('product_id', $product_id)->firstOrfail();

        // besoin de l'id product
        // en corelation avec order

        $data = [            
            'order' => $order,
        ];
           
        $pdf = PDF::loadView('pdf', $data);
     
        return $pdf->download('mybill.pdf');  
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
        //
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
