<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Menu;
use App\Models\Mitra;

class RatingController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        $mitra = Mitra::where('name', $user->name)->first();


        $ratingsQuery = Rating::query();


        if ($mitra) {
            $ratingsQuery->whereHas('order.menu', function ($query) use ($mitra) {
                $query->where('nama_toko', $mitra->nama_toko);
            });
        }


        $ratings = $ratingsQuery->with(['order.menu', 'order.user'])
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

        return view('ratings.index', compact('ratings'));
    }
}