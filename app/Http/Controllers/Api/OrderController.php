<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Log;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'total_amount' => 'required|numeric|min:0',
            'items' => 'required|array',
            'items.*.product_id' => 'required|integer',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        try {
            $order = Order::create($request->all());

            return response()->json($order, 201);

        } catch (\Exception $e) {
            Log::channel('errors')->error('Error al crear la orden: ' . $e->getMessage(), [
                'request' => $request->all(),
                'exception' => $e
            ]);
            
            return response()->json(['error' => 'Error inteno al procesar la orden'], 500);
        }
    }

    public function show(string $id): JsonResponse
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Orden no encontrada'], 404);
        }

        return response()->json($order);
    }
}
