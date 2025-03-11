<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.form_login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->role === 'author') {
            return redirect()->route('dashboard.author');
        } else {
            return redirect()->route('dashboard.subscriber');
        }
    }

    return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
}



    public function showRegisterForm()
    {
        return view('auth.form_regis');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tanggal_lahir' => 'required|date|before:today',
        'password' => 'required|min:8',
    ]);

    $path = null;
    if ($request->hasFile('foto_profil')) {
        $path = $request->file('foto_profil')->store('profile_pictures', 'public');
    }

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->foto_profil = $path;
    $user->tanggal_lahir = $request->input('tanggal_lahir');
    $user->password = Hash::make($request->input('password'));
    $user->role = 'subscriber'; // Default role

    $user->save();

    return redirect()->route('login')->with('success', 'Registration successful as Subscriber');
}



    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard.subscriber');
    }
}
