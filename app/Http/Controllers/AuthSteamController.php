<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Invisnik\LaravelSteamAuth\SteamAuth;

class AuthSteamController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/';

    /**
     * AuthController constructor.
     *
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
        $this->steam->setRedirectUrl(route('auth.steam'));
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Check authentication of user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function Authenticate(Request $request)
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $request->session()->put('user.authenticated', time());
                $request->session()->put('user.name', $info->personaname);
                $request->session()->put('user.profile', $info->profileurl);
                $request->session()->put('user.avatar', $info->avatarfull);
                $request->session()->put('user.id', $info->steamID64);

                return redirect($this->redirectURL);
            }
        }

        return $this->redirectToSteam();
    }

    public function Logout(Request $request)
    {
        Session::flush();

        return redirect('/');
    }
}
