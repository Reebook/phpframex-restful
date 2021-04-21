<?php
  // file: controllers/ProfessorController.php

  require_once('Author.php');

  class AuthorController extends Controller {

    public function index() {  
      return view('Author/index',
       ['authors'=>Author::all(),
        'title'=>'Author List']);
    }

    public function show($id) {
      $author = Author::find($id);
      return view('Author/show',
        ['author'=>$author,
         'title'=>'Author Detail']);
    }
  }
?>