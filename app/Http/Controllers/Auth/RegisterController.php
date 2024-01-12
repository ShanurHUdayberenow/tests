<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
class RegisterController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $locale = app()->getLocale();
        return view('frontend.auth.register', compact('categories'))->with('locale', $locale);
    }

    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email'=> $data['email'],
            'phoneNumber' => $data['phoneNumber'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('register');
    }
}
