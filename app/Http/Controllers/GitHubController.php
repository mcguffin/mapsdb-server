<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;

class GitHubController extends Controller
{
    //
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->user();

            $searchUser = User::where('github_id', $user->id)->first();

            if($searchUser){

                Auth::login($searchUser);

                return redirect('/dashboard');

            }else{

                $gitUser = User::create([
                    'name' => $user->name?:$user->nickname,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'github_login'=> $user->nickname,
                    'auth_type'=> 'github',
                    'password' => encrypt( base64_encode( random_bytes(12) ) ),
                ]);

                Auth::login($gitUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
