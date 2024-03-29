<?php

namespace App\Http\Controllers;

use App\Models\rescuefood;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FormController extends Controller
{
    public function index(){
        $form = rescuefood::all();
        return view ('form.index',compact(['form']));
    }
    public function create(){
        return view('form.create');
    }
    public function store(Request $request)
    {
        rescuefood::create($request->except(['_token','submit']));
        return redirect('/form');
    }

    public function update($id, Request $request){
        $form = rescuefood::find($id);
        $form->update($request->except(['_token','submit']));;
        return redirect('/form');
    }
    
    public function destroy($id){
        $form = rescuefood::find($id);
        $form->delete();
        return redirect('/form');
    }
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
    /**public function index()
    {
        return view('home');
    }
    */
}
