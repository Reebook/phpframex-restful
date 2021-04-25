<?php
  // file: controllers/BookController.php

  require_once('Book.php');

  class BookController extends Controller {

    public function index() {  
        return view('Books/index',
         ['books'=>Book::all(),
          'title'=>'Books List']);
      }
  
      public function show($id) {
        $book = Book::find($id);
        return view('Books/show',
          ['book'=>$book,
           'title'=>'Books Detail']);
      }
  }
?>