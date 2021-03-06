<?php
  // file: controllers/ProfessorController.php

  require_once('models/author.php');

  class AuthorController extends Controller {

    public function index() {  
      return view('Author/index',
      ['author'=>DB::table('author')->get(),
      'title'=>'Author List','login'=>Auth::check()]);
    }

    public function show($author_id) {
      $author = DB::table('author')->find($author_id);
      return view('Author/show',
        ['author'=>$author,
         'title'=>'Author Detail',
         'show'=>true,'create'=>false,'edit'=>false,
         'login'=>Auth::check()]);
    }

    public function create() {
      if (!Auth::check()) return redirect('/login');
      $author = ['name'=>'','nationality'=>'',
               'birth'=>'','fields'=>''];
      return view('Author/show',
      ['title'=>'Author Create',
      'author'=>$author,
      'show'=>false,'create'=>true,'edit'=>false,
      'login'=>Auth::check()]);
    } 

    public function store() {
      if (!Auth::check()) return redirect('/login');
      $name = Input::get('name');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth');
      $fields = Input::get('fields');
      $item = ['name'=>$name,'nationality'=>$nationality,
               'birth'=>$birth,'fields'=>$fields];
      Publisher::create($item);
      return redirect('/author');
    } 

    public function edit($author_id) {
      if (!Auth::check()) return redirect('/login');
      $author = DB::table('author')->find($author_id);
      return view('Author/show',
        ['author'=>$author,
         'title'=>'Author Edit',
         'show'=>false,'create'=>false,'edit'=>true,
         'login'=>Auth::check()]);
    }

    public function update($_,$author_id) {
      if (!Auth::check()) return redirect('/login');
      $name = Input::get('name');    
      $nationality = Input::get('nationality');
      $birth = Input::get('birth');
      $fields = Input::get('fields');

      $item = ['name'=>$name,'nationality'=>$nationality,
               'birth'=>$birth,'fields'=>$fields];
      DB::table('author')->update($author_id,$item);
      return redirect('author');
    }

    public function destroy($author_id) {  
      if (!Auth::check()) return redirect('/login');
      DB::table('author')->delete($author_id);
      return redirect('author/index');
    }
  }
?>