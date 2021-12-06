<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('show.index');
        }else{
            return back()->with('fail','Tài khoản hoặc mật khẩu sai!!!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('show.login');
    }

    public function showRegister()
    {
        return view('backend.register');
    }

    public function register(Request $request)
    {   
        $password = Hash::make('password');
        $user = new User();
        $user->name = $request->input('name');
        $user->password = $password;
        $user->email = $request->input('email');
        $user->level = '3';
        $user->save();
        return redirect()->route('show.login')->with('success','Tạo tài khoản thành công');
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){
                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect()->route('show.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
