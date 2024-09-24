<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // 全ユーザーを取得
        return view('user.index', compact('users')); // ユーザー一覧画面を表示
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // ユーザーを取得
        return view('user.edit', compact('user')); // 編集画面を表示
    }

    public function update(Request $request, $id)
{
    // 管理者権限を持つユーザーのみが権限を変更できるようにチェック
    $currentUser = auth()->user();
    $isAdmin = $currentUser->role == 1;

    $request->validate([
        'name' => 'nullable|string|max:255', // 名前は任意
        'email' => 'nullable|string|email|max:255', // メールアドレスは任意
        'password' => 'nullable|string|min:8', // パスワードは任意
        'role' => 'required_if:isAdmin,1|in:0,1', // 管理者の場合のみ権限を変更
    ]);

    $user = User::findOrFail($id); // ユーザーを取得

    // パスワードが入力されている場合のみ更新
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // 名前とメールアドレスを更新（任意のため、空であれば変更しない）
    if ($request->has('name')) {
        $user->name = $request->name;
    }

    if ($request->has('email')) {
        $user->email = $request->email;
    }

    // 管理者が権限を変更する場合のみ更新
    if ($isAdmin && $request->has('role')) {
        $user->role = $request->role;
    }

    $user->save(); // ユーザー情報を保存

    return redirect()->route('user.index')->with('success', 'ユーザー情報が更新されました。');
}

// ユーザー削除機能
public function destroy($id)
{
    $user = User::findOrFail($id); // ユーザーを取得
    $user->delete(); // ユーザーを削除

    return redirect()->route('user.index')->with('success', 'ユーザーが削除されました。');
}

}