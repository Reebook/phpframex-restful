<?php
  // file: controllers/BookController.php

  require_once('models/book.php');

  class BookController extends Controller {

    public function index() {  
      return view('Books/index',
      ['books'=>DB::table('book')->get(),
      'title'=>'Book List']);
    }
  
    public function show($prof_id) {
      $prof = DB::table('book')->find($prof_id);
      return view('books/show',
        ['book'=>$prof,
         'title'=>'book Detail',
         'show'=>true,'create'=>false,'edit'=>false]);
    }

    public function create() {
      $prof = ['name'=>'','degree'=>'',
               'email'=>'','phone'=>''];
    return view('books/show',
      ['title'=>'book Create',
      'book'=>$prof,'courses'=>false,
      'show'=>false,'create'=>true,'edit'=>false]);
  } 

    public function store() {
      $title = Input::get('title');
      $copyright = Input::get('copyright');
      $edition = Input::get('edition');
      $language = Input::get('language');
      $publisher = Input::get('publisher');
      $pages = Input::get('pages');
      $item = ['title'=>$name,'copyright'=>$degree,
               'edition'=>$email,'language'=>$phone,'publisher'=>$publisher,'pages'=>$pages];
      book::create($item);
      return redirect('books');
    }  

    public function edit($prof_id) {
      $prof = DB::table('book')->find($prof_id);
      return view('books/show',
        ['book'=>$prof,
         'title'=>'book Edit','courses'=>false,
         'show'=>false,'create'=>false,'edit'=>true]);
    }

    public function update($_,$prof_id) {
      $name = Input::get('name');
      $degree = Input::get('degree');
      $email = Input::get('email');
      $phone = Input::get('phone');
      $prof = ['name'=>$name,'degree'=>$degree,
               'email'=>$email,'phone'=>$phone];
      DB::table('book')->update($prof_id,$prof);
      return redirect('/books');
    }

    public function destroy($prof_id) {  
      DB::table('book')->destroy($prof_id);
      return redirect('/books');
    }
  }
?>