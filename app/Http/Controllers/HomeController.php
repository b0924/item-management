<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $userName = Auth::user()->name; // ログインユーザーの名前を取得
        $newItemMessage = session('new_item_message'); // 新規商品メッセージを取得

        return view('home', compact('userName', 'newItemMessage'));
    }
}
