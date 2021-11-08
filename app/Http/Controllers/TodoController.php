<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return view('/index');
    }
    public function create(Request $request)
    {
        //DBに保存
        'created_at' -> $request -> newcreated_at;
        'content'   -> $request -> newcontent;

        $todo = new Todo;
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');

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
        return redirect('/');
    }
    public function delete($id)
    {
        $author = Todo::find($request->id);
        return view('delete', ['form' => $author]);

        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
