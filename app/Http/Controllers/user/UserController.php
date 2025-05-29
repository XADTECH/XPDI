<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'profile_name' => ['required', 'string', 'max:255', 'unique:users,profile_name'],
            'full_name'    => ['required', 'string', 'max:255'],
            'phone'        => ['required', 'string', 'max:14'],
            'email'        => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password'     => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Validation passed, continue
        $user = User::create([
            'profile_name' => $request->profile_name,
            'name'         => $request->full_name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'phone'        => $request->phone,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return response()->json([
            'success' => true,
            'redirect' => route('user.dashboard'),
        ]);
    }
    public function dashboard()
    {
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

    public function purchaseHistory()
    {

        $user_id = Auth::user()->id;

        $order_data = Order::where('user_id', $user_id)->with('course', 'user', 'instructor')->latest()->get();
        return view('backend.user.purchase-history.index', compact('order_data'));
    }


    public function lectures(Request $request, $course_id)
    {
        $course = Course::with([
            'instructor:id,name',
            'category:id,name',
            'course_lecture',
            'course_section.lecture'
        ])->find($course_id);

        // Safely get the first lecture (could be null)
        $firstLecture = $course->course_section->flatMap->lecture->first();

        // dd(json_decode($course));

        // Safely build embed URL or default to null
        $videoUrl = $firstLecture?->url;
        $embedUrl = $videoUrl ? Str::replace('watch?v=', 'embed/', $videoUrl) : null;


        return view('backend.user.lectures', compact('course', 'firstLecture', 'embedUrl'));
    }
}
