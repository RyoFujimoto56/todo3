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
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('/');


    }
    public function update(Request $request)
    {

        $form = $request->all();
        unset($form['_token']);
        $todo = Todo::where('id',$request->id);
        $todo -> update($form);
        return redirect('/');

    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo -> delete();
        return redirect('/');
    }
}
