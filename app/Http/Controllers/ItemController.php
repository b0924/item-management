<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::orderBy('id', 'asc')->get(); // 商品をID順で取得
        return view('item.index', compact('items'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // 検索条件を作成
        $items = Item::where('name', 'LIKE', "%{$query}%")
            ->orWhere('detail', 'LIKE', "%{$query}%")
            ->orderByRaw("CASE 
                WHEN name LIKE '{$query}%' THEN 1 
                WHEN name LIKE '%{$query}%' THEN 2 
                WHEN detail LIKE '{$query}%' THEN 3 
                WHEN detail LIKE '%{$query}%' THEN 4 
                ELSE 5 
            END")
            ->get();

        return view('item.index', compact('items'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|string|max:100', // 名前の文字数制限
                'type' => 'required|string|max:50', // タイプの文字数制限（必要に応じて変更）
                'detail' => 'required|string|max:255', // 詳細の文字数制限
            ]);

            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect()->route('items.index')->with('success', '商品が登録されました');
        }

        return view('item.add');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100', // 名前の文字数制限
            'type' => 'required|string|max:50', // タイプの文字数制限（必要に応じて変更）
            'detail' => 'required|string|max:255', // 詳細の文字数制限
        ]);

        $item = Item::findOrFail($id); // ここでアイテムを取得
        $item->name = $request->name;
        $item->type = $request->type;
        $item->detail = $request->detail;
        $item->save(); // 保存

        return redirect()->route('items.index')->with('success', '商品が更新されました');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', '商品が削除されました');
    }
}

