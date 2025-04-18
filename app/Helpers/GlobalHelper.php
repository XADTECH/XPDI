<?php

use App\Models\Category;
use App\Models\PageSetting;
use App\Models\Partner;
use App\Models\Review;
use App\Models\SiteInfo;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

if (!function_exists('isApprovedUser')) {
    function isApprovedUser()
    {
        $user_id = Auth::id();
        return User::where('role', 'instructor')
            ->where('status', '1')
            ->where('id', $user_id)
            ->first();
    }
}


if (!function_exists('getCourseCategories')) {
    function getCourseCategories() {
        return Category::with('course', 'course.user', 'course.course_goal')->get();
    }
}

if (!function_exists('getCategories')) {
    function getCategories() {
        return  Category::with('subcategory')->get();
    }
}

if (!function_exists('getWishlist')) {
    function getWishlist() {

         // Check if user is authenticated
         if (Auth::check()) {
            $user_id = Auth::user()->id;
            return Wishlist::where('user_id', $user_id)->with('course', 'course.user')->get();
        }
         // If user is not logged in, return an empty collection or handle as needed
         return collect();
    }
}

function auth_check_json()
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You must be logged in to perform this action.',
            ], 401); // 401 Unauthorized
        }
        return null;
    }



    if (!function_exists('getSiteInfo')) {
        function getSiteInfo()
        {
            // Fetch the first site info record
            return SiteInfo::first();
        }
    }

    if (!function_exists('getPageInfo')) {
        function getPageInfo()
        {
            // Fetch the first site info record
            return PageSetting::first();
        }
    }





    if (!function_exists('getInstructorInfo')) {
        function getInstructorInfo()
        {
            // Fetch the first site info record
            return User::where('role', 'instructor')->get();
        }
    }

    if (!function_exists('studentReview')) {
        function studentReview()
        {
            // Fetch the first site info record
            return Review::with('user')->get();
        }
    }

    if (!function_exists('partner')) {
        function partner()
        {
            // Fetch the first site info record
            return Partner::latest()->get();
        }
    }


    /** Set sidebar active **/

if(!function_exists('setSidebarActive')){
    function setSidebarActive(array $routes) : ?String
    {
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'page-active';
            }
        }
        return null;
    }
}

/** set admin sidebar active */

    /** Set sidebar active **/

    if(!function_exists('setSidebar')){
        function setSidebar(array $routes) : ?String
        {
            foreach($routes as $route){
                if(request()->routeIs($route)){
                    return 'mm-active';
                }
            }
            return null;
        }
    }

