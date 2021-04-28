<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Pedido::with(['produto'])->get(),200);
    }

    public function deliverOrder(Pedido $pedido)
    {
        $pedido->is_delivered = true;
        $status = $pedido->save();

        return response()->json([
            'status' => $status,
            'data' => $pedido,
            'message' => $status ? 'Pedido Entregue!' : 'Error Deliveirng Order'
        ]);
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
        $pedido = Pedido::create([
            'produto_id' => $request->produto_id,
            'usuario_id' => Auth::id(),
            'quantidade' => $request->quantidade,
            'endereco' => $request->endereco
        ]);

        return response()->json([
            'status' => (bool) $pedido,
            'data' => $pedido,
            'message' => $pedido ? 'Pedido criado!' : 'Error Creating Order'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
        return response()->json($pedido,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
        $status =  $pedido->update(
            $request->only(['quantidade'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Pedido Atualizado!' : 'Error Updating Order'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
        $status = $pedido->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Pedido Deletado!' : 'Error Deleting Order'
        ]);
    }
}
