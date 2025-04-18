<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\admin\PasswordUpdateService;
use App\Services\admin\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $profileService, $passwordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $passwordUpdateService)
    {
        $this->profileService = $profileService;
        $this->passwordUpdateService = $passwordUpdateService;
    }


    public function index(){
        return view('backend.admin.profile.index');
    }

    public function store(ProfileRequest $request){

         // Pass data and files to the service
         $this->profileService->saveProfile($request->validated(), $request->file('photo'));
         return redirect()->back()->with('success', 'Profile Updated successfully');

    }

    public function setting(){
        return view('backend.admin.profile.setting');

    }

    public function passwordSetting(ProfilePasswordUpdateRequest $request){

        // Pass data and files to the service
        $this->passwordUpdateService->updatePassword($request->validated());
        return redirect()->back()->with('success', 'Password Updated successfully');

    }
}
