<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    protected $friends = array();
    protected $loadedFriends = array();

    public function Home(Request $request)
    {
        $user = $request->session()->get('user');

        if(!empty($user)) {
            $this->LoadFriends($user['id']);
        }

        return view('index', ['friends' => $this->loadedFriends]);
    }

    private function LoadFriends($uid)
    {
        $request = Http::get('http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key='.config('steam-auth.api_key').'&steamid='.$uid.'&relationship=friend');

        if($request->failed()) {
            abort($request->status());
        }

        $this->friends = $request->json()['friendslist']['friends'];
        $this->LoadFriendsInfo();
    }

    private function LoadFriendsInfo()
    {
        $fid = '';
        foreach($this->friends as $friend) {
            $fid .= $friend['steamid'] . ',';
        }

        $fid = trim($fid, ',');
        $info = Http::get('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.config('steam-auth.api_key').'&steamids='.$fid);

        if($info->successful()) {
            $this->loadedFriends = $info->json()['response']['players'];
        }
    }
}
