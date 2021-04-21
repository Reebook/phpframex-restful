<?php
  // file: controllers/BookController.php

  require_once('Book.php');

  class BookOldController extends Controller {

    public function index() {  
      return view('BooksOld/index');
    }

    public function show($id) {
      switch($id){
        case 1:
          return view('BooksOld/libro1');        
        case 2:
          return view('BooksOld/libro2');        
        case 3:
          return view('BooksOld/libro2');
        case 4:
          return view('BooksOld/libro2');

      }

      return view('books/show');
    }
  }
?>