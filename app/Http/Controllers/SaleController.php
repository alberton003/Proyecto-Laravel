<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SaleController extends Controller
{
    // Mostrar historial de ventas
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    // Formulario para vender (opcional, podrías usar una ventana modal)
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    // Guardar la venta y RESTAR stock
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // --- VALIDACIÓN DE STOCK ---
        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stock insuficiente. Solo quedan ' . $product->stock . ' unidades.']);
        }

        // --- REGISTRAR VENTA ---
        Sale::create([
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $request->quantity,
        ]);

        // --- RESTAR STOCK ---
        $product->decrement('stock', $request->quantity);

        return redirect()->route('products.index')->with('ok', 'Venta realizada y stock actualizado.');
    }
}