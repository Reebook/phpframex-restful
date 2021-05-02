<?php
  // file: controllers/ProfessorController.php

  require_once('models/author.php');

  class AuthorController extends Controller {

    public function index() {  
      return view('Author/index',
      ['author'=>DB::table('author')->get(),
      'title'=>'Author List']);
    }

    public function show($author_id) {
      $author = DB::table('author')->find($author_id);
      return view('Author/show',
        ['author'=>$author,
         'title'=>'Author Detail',
         'show'=>true,'create'=>false,'edit'=>false]);
    }

    public function create() {
      $author = ['name'=>'','nationality'=>'',
               'birth'=>'','fields'=>''];
      return view('Author/show',
      ['title'=>'Author Create',
      'book'=>$author,
      'show'=>false,'create'=>true,'edit'=>false]);
    } 

    public function store() {
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
      $author = DB::table('Author')->find($author_id);
      return view('Author/show',
        ['author'=>$author,
         'title'=>'Author Edit',
         'show'=>false,'create'=>false,'edit'=>true]);
    }

    public function update($_,$author_id) {
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
      DB::table('author')->delete($author_id);
      return redirect('author/index');
    }
  }
?>