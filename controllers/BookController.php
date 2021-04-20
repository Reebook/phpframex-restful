<?php
  // file: controllers/BookController.php

  require_once('Book.php');

  class BookController extends Controller {

    public function index() {  
      return view('Books/index');
    }

    public function show($id) {
      switch($id){
        case 1:
          return view('Books/libro1');        
        case 2:
          return view('Books/libro2');        
        case 3:
          return view('Books/libro2');
        case 4:
          return view('Books/libro2');

      }

      return view('books/show');
    }
  }
?>