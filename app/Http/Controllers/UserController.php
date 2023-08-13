<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class UserController extends Controller
{

    public function login(){
        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

           // Flashy::success('Vous êtes actuellement connecté');
            return redirect()->route('archiver');
        }

        // Flashy::error("Votre mot de passe est incorrect !");
        return back()->with('status', 'identifiants incorrects !');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerSave(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'password' => 'required'
        ]);

        $user = null;
        try {
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = request('password');
            $user->role_id = 2;
            $user->save();

        } catch (\Exception $ex) {
            $msgError = "";
            foreach ($ex as $key => $value) {
                $msgError = $value[2];
                # code...
            }
            $msg = "Cette adresse E-mail est déjà utilisée !";
            if(str_contains($msgError, "users_email_unique")){
                return redirect()->back()->with('status', $msg);
            }
        }

        auth()->login($user);

        return redirect()->route('archiver');


    }

    public function signout() {
        auth()->logout();
        $msg = "Vous êtes actuellement deconnecté !";
        //Flashy::primary($msg);
        return redirect()->to('/');

    }
}
