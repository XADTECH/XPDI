<?php


namespace App\Repositories\admin;

use App\Models\User;
use App\Traits\FileUploadTrait; // Import the FileUploadTrait
use Illuminate\Support\Facades\Auth;

class ProfileRepository
{
    use FileUploadTrait; // Use the FileUploadTrait

    public function findProfile()
    {
        $user_id = Auth::user()->id;
        return User::where('id', $user_id)->first();
    }

    public function createOrUpdateProfile($data, $photo)
    {
        $profile = $this->findProfile();

        if (!$profile) {
            $profile = new User();
        }

        // Handle file uploads manually
        if ($photo) {
            $profile->photo = $this->uploadFile($photo, 'user', $profile->photo);
        }

        // Manually assign other fields from $data
        $profile->first_name = $data['first_name'] ?? $profile->first_name;
        $profile->last_name = $data['last_name'] ?? $profile->last_name;
        $profile->name = $data['name'] ?? $profile->name;
        $profile->email = $data['email'] ?? $profile->email;
        $profile->phone = $data['phone'] ?? $profile->phone;
        $profile->address = $data['address'] ?? $profile->address;
        $profile->bio = $data['bio'] ?? $profile->bio;
        $profile->city = $data['city'] ?? $profile->city;
        $profile->country = $data['country'] ?? $profile->country;
        $profile->gender = $data['gender'] ?? $profile->gender;
        $profile->experience = $data['experience'] ?? $profile->experience;
        $profile->professional_info = $data['professional_info'] ?? $profile->professional_info;

        // Save the intro
        $profile->save();

        return $profile;
    }
}
