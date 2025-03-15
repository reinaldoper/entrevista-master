<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return redirect()->route('login')->with('success', 'Usuário registrado com sucesso.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return redirect()->back()->with('error', 'Credenciais inválidas.');
            }
        } catch (JWTException $e) {
            return redirect()->back()->with('error', 'Não foi possível criar o token.');
        }

        return redirect()->route('drivers.index')->withCookie(cookie('token', $token, 60))->with('success', 'Login realizado com sucesso.');
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return redirect()->route('login')->withCookie(cookie()->forget('token'))->with('success', 'Logout realizado com sucesso.');
        } catch (JWTException $e) {
            return redirect()->back()->with('error', 'Falha ao realizar logout.');
        }
    }
}
