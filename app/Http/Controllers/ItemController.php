<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
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

        public function index()
        {
            $items = Item::all(); // 商品一覧を取得
            return view('item.index', compact('items'));
        }
    
        public function search(Request $request)
        {
            $query = $request->input('query');
            $items = Item::where('name', 'LIKE', "%{$query}%")
                ->orWhere('detail', 'LIKE', "%{$query}%")
                ->orderBy('name')
                ->get();
    
            return view('item.index', compact('items'));
        }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
}

