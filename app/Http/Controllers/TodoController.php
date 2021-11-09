<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('/index',['todos' => $todos]);
    }
    public function create(Request $request)
    {
        //DBに保存
        'created_at' -> $request -> newcreated_at;
        'content'   -> $request -> newcontent;

        $todos = ['created_at','content'];

        $todo = new Todo;
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/index');

        $validate_rule = [
            'content'=>'required|max:255',
        ];
        
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        unset($form['_token']);
        Author::where('id', $request->id)->update($form);
        return redirect('/index');
    }
    public function delete($id)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);

        Todo::find($request->id)->delete();
        return redirect('/index');
    }
}
