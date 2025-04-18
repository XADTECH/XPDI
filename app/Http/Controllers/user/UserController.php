<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        $user_id = Auth::user()->id;

        $enrolled_course = Order::where('user_id', $user_id)->count();
        $wishlist_course = Wishlist::where('user_id', $user_id)->count();
        $total_purchase_amount = Order::where('user_id', $user_id)->sum('price');

        return view('backend.user.index', compact('enrolled_course', 'wishlist_course', 'total_purchase_amount'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function purchaseHistory(){

        $user_id = Auth::user()->id;

        $order_data = Order::where('user_id', $user_id)->with('course', 'user', 'instructor')->latest()->get();
        return view('backend.user.purchase-history.index', compact('order_data'));
    }


}
