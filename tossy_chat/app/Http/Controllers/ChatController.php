<?php

namespace App\Http\Controllers;

use App\Models\Chat;

use Illuminate\Http\Request;

use Illuminate\Support\Str; # 追加

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**
         *  POST で　入力されたチャットメッセージの表示
         */

        // === ユーザー識別子 をセッションに登録
        $user_identifier = $request->session()->get('user_identifier', str::random(20));

        // session(['user_identifier' => $user_identifier]);

        // ユーザー識別子がなければランダムに生成してセッションに登録

        /*
        if ($request->session()->missing('user_identifier')) {
            $user_identifier = $request->session()->get('user_identifier', str::random(20));
        }
        */

        /*
        if ($request->session()->missing('user_name')) {
            session(['user_name' => 'anonymous']);
        }
        */

        $user_name = $request->session()->get('user_name', 'anonymous');

        session(['user_name' => 'anonymous']);
        session(['user_identifier' => $user_identifier]);

        // ユーザー名を変数に登録（デフォルト値：Guest）
        // $user_name = $request->session()->get('user_name', 'anonymous');

        // === 全件　データ取得
        $chat_len = Chat::all()->count();

        // 表示する件数
        $display = 5;

        // === 最新上位 ５件　取得
        $chats = Chat::offset($chat_len - $display)->limit($display)->get();

        // $user_identifiers = Chat::select('user_identifier')->offset($chat_len - $display)->limit($display)->get();

        // return view('chat/index', compact('chats', 'user_identifier', 'user_name'));
        //    return view('chat/index', compact('chats', 'user_identifier'));
        return view('chat.index', compact('chats', 'user_identifier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    // ====== formで入力されたデータを保存している ======
    public function store(Request $request)
    {

        // ユーザー名をフォームから取得　セッションに登録
        session(['user_name' => $request->user_name]);

        //============ POST 処理
        $chat = new Chat;
        $form = $request->all();
        // fill => プロパティの省略
        #     $save_return = $chat->fill($form)->save(); // === DB インサート

        $chat->fill($form)->save(); // === DB インサート

        // 最初の画面にリダイレクト
        // return redirect(route('chat.index'));

        // 全セッション 削除
        // $request->session()->flush();

        return redirect('./chat');

        // === save() メソッドの返り値　true , false

        /*
        if ($save_return) {

            return redirect('tossy_chat/chat');
        } else {
            return false;
        }
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
