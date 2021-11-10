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
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');


    }
    public function update(Request $request, $id)
    {
        $this->validate($request);
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete($id)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);

        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
