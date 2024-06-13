<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\Mitra;
use App\Models\Promo;
use App\Models\User;
use App\Models\Stock;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        $mitra = Mitra::where('name', $user->name)->first();
    
        if ($mitra) {
            $orderMenuIds = Order::whereHas('menu', function ($query) use ($mitra) {
                $query->where('nama_toko', $mitra->nama_toko);
            })->pluck('menu_id')->toArray();
    
            $namaTokos = Menu::whereIn('id', $orderMenuIds)->pluck('nama_toko')->unique()->toArray();
    
            $mitraNames = Mitra::whereIn('nama_toko', $namaTokos)->pluck('name')->toArray();
    

            $orders = Order::whereIn('menu_id', $orderMenuIds)->paginate(10);
    
            $menus = Menu::whereIn('id', $orderMenuIds)->get(); 
    
        } else {
            $orders = collect();
            $menus = collect();
        }
    
        return view('orders.index', compact('orders', 'menus', 'mitraNames'));
    }
    


    public function create()
    {
        $menus = Menu::all();
        $promos = Promo::all();
        $customers = User::where('role', 'customer')->get();

        return view('orders.create', compact('menus', 'promos', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'promo_id' => 'exists:promos,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->input('menu_id'));
        $promo = Promo::find($request->input('promo_id'));
        $user = User::find($request->input('user_id'));

        $stock = Stock::where('menu_id', $menu->id)->first();

        if (!$stock || $stock->quantity < $request->input('quantity')) {
            return redirect()->back()->with('error', 'Stock habis atau tidak mencukupi untuk pesanan ini');
        }


        $subtotal = $menu->harga_menu * $request->input('quantity');

        $discountAmount = ($promo) ? ($subtotal * ($promo->nilai_potongan / 100)) : 0;

        $totalPrice = $subtotal - $discountAmount;

        $order = new Order([
            'quantity' => $request->input('quantity'),
            'total_price' => $totalPrice,
            'name' => $user->name,
        ]);

        $order->menu()->associate($menu);
        $order->promo()->associate($promo);
        $order->user()->associate($user);
        $order->save();

        $stock->quantity -= $request->input('quantity');
        $stock->save();

        return redirect()->route('orders.index')->with('success', 'Order berhasil ditambahkan');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $menus = Menu::all();
        $promos = Promo::all();
        $customers = User::where('role', 'customer')->get();

        return view('orders.edit', compact('order', 'menus', 'promos', 'customers'));
    }

    public function update(Request $request, Order $order)
{
    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'promo_id' => 'nullable|exists:promos,id',
        'user_id' => 'required|exists:users,id',
        'quantity' => 'required|integer|min:1',
        'status' => 'required|in:Pesanan Belum Diterima,Pesanan Sedang Dipersiapkan,Pesanan Siap,Pesanan Dibatalkan',
    ]);

    $menu = Menu::findOrFail($request->input('menu_id'));
    $promo = $request->input('promo_id') ? Promo::findOrFail($request->input('promo_id')) : null;
    $user = User::findOrFail($request->input('user_id'));

    $order->menu()->associate($menu);
    $order->promo()->associate($promo);
    $order->user()->associate($user);
    $order->quantity = $request->input('quantity');

    // Perbaikan perhitungan total harga dengan diskon
    $subtotal = $menu->harga_menu * $request->input('quantity');
    $discountAmount = 0;

    if ($promo) {
        $discountAmount = $subtotal * ($promo->nilai_potongan / 100);
        // Pastikan diskon tidak melebihi subtotal
        $discountAmount = min($discountAmount, $subtotal);
    }

    $order->total_price = max($subtotal - $discountAmount, 0);
    $order->status = $request->input('status');

    $order->save();

    return redirect()->route('orders.index')->with('success', 'Order berhasil diupdate');
}                                 



    public function destroy(Order $order)
    {
        
        $menu = $order->menu;
        $quantity = $order->quantity;

        
        $stock = Stock::where('menu_id', $menu->id)->first();

        if ($stock) {
            
            $stock->quantity += $quantity;
            $stock->save();
        } else {
            
        }

        
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus dan stok dikembalikan');
    }
    public function customerHistory()
    {

        $orders = Order::where('user_id', Auth::id())
                        ->where('status', 'Pesanan Siap')
                        ->whereDoesntHave('rating') 
                        ->with('menu')
                        ->get();
    
        return view('customer.history', compact('orders'));
    }
    
    public function showReview(Order $order)
    {
        $rating = $order->rating;
        return view('customer.review', compact('order', 'rating'));
    }

    public function ratingForm(Order $order)
    {
        if ($order->rating) {
            return redirect()->route('customer.history')->with('error', 'Anda sudah memberikan rating untuk pesanan ini.');
        }
        return view('customer.rating', compact('order'));
    }


    public function submitRating(Request $request, Order $order)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        if ($order->rating) {
            return redirect()->route('customer.history')->with('error', 'Anda sudah memberikan rating untuk pesanan ini.');
        }

        $rating = new Rating([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'order_id' => $order->id
        ]);

        $order->rating()->save($rating);

        return redirect()->route('customer.history')->with('success', 'Terima kasih telah memberikan rating!');
    }
    public function sales()
    {
        $user = Auth::user();
        $mitra = Mitra::where('name', $user->name)->first();

        if (!$mitra) {
            return redirect()->route('home')->with('error', 'Anda tidak terkait dengan mitra manapun.');
        }

        $date = request()->input('date', Carbon::today()->toDateString());

        $orders = Order::whereHas('menu', function ($query) use ($mitra) {
                $query->where('nama_toko', $mitra->nama_toko);
            })
            ->whereDate('created_at', $date)
            ->with('menu')
            ->get();


        $totalSales = $orders->sum('total_price');

        return view('sales.index', compact('orders', 'totalSales', 'date'));
    }

    

}