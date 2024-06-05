<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller {

    // 日記のCRUD管理を行うメソッド
    // public function operationDiary(Request $request) {

        // // メソッドに引数として渡す値を変数として準備
        // $userId = auth()->id();
        // $diaryId = $request->input('diary_id');
        // $title = $request->input('title');
        // $content = $request->input('content');
        // $operation = $request->input('operation');

        

        // $diaries = Diary::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        // return view('/listDiary', compact('diaries'));
    // }

    //日記の表示を行うメソッド（デフォルト新着順）
    public function displayDiary() {
        $diaries = Diary::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('listDiary', compact('diaries'));
    }

    public function create() {
        return view('createDiary');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $diary = new Diary();
        $diary->title = $request->title;
        $diary->content = $request->content;
        $diary->user_id = auth()->id();
        $diary->save();

        return redirect()->route('listDiary');
    }

    public function edit(Diary $diary) {
        return view('editDiary', compact('diary'));
    }

    public function update(Request $request, Diary $diary) {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $diary->title = $request->title;
        $diary->content = $request->content;
        $diary->save();
    
        return redirect()->route('listDiary');
    }

    public function destroy($id) {
        $diary = Diary::find($id);
        if ($diary->user_id == auth()->id()) {
            $diary->delete();
            return redirect()->route('listDiary');
        } else {
            return redirect()->route('listDiary')->withErrors('Diary not found or unauthorized');
        }
    }

}