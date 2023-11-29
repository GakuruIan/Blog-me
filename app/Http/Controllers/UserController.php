<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected function authenticated(Request $request, $user)
    {
        return redirect('/blogs');
    }

    public function LoginForm(){
        return view('Auth.login');
    }

    public function RegisterForm(){
        return view('Auth.register');
    }

    public function ProfileForm(){
        $user = auth()->user();
        return view('Auth.Profile',['user'=>$user]);
    }

    public function Register(Request $request){

        $validated = $request->validate([
            'username'=>'required|min:3|max:15',
             'email'=>'required|email',
             'password'=>'required|min:8|confirmed'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        User::Create($validated);

        return redirect()->route('login');
    }

    public function Login(Request $request){
            $validated = $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:8'
            ]);

            $remember = $request->has('remember');

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                return redirect('/blogs')->with('success','Login Successful');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
    }

    public function Update(Request $request){
        $validated = $request->validate([
            'username'=>'required|min:3|max:15',
             'email'=>'required|email',
             'password'=>'nullable|min:8|confirmed'
        ]);

        if(!empty($validated['password'])){
            $validated['password'] = Hash::make($validated['password']);
        }

        $user = User::findorfail(auth()->user()->id);

        $user->update($validated);
        
        return redirect('/blogs')->with('messages','Profile updated Successfully');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
    
        return redirect()->route('login');
    }
}
