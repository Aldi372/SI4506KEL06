<?php



namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Menu;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::simplePaginate(5);
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('stocks.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:0',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock created successfully.');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $menus = Menu::all();
        return view('stocks.edit', compact('stock', 'menus'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}