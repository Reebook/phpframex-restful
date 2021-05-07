<?php
  // file: controllers/BookController.php

  require_once('models/book.php');

  class BookController extends Controller {

    public function index() {  
      return view('Books/index',
      ['books'=>DB::table('book')->get(),
      'title'=>'Book List','login'=>Auth::check()]);
    }
  
    public function show($prof_id) {
      $prof = DB::table('book')->find($prof_id);
      return view('Books/show',
        ['book'=>$prof,
         'title'=>'Book Detail',
         'show'=>true,'create'=>false,'edit'=>false,
         'login'=>Auth::check()]);
    }

    public function create() {
      if (!Auth::check()) return redirect('/login');
      $prof = ['titleName'=>'','copyright'=>'',
               'edition'=>'','language'=>'','publisher'=>'','pages'=>'','author'=>''];
      return view('Books/show',
      ['title'=>'Book Create',
      'book'=>$prof,'courses'=>false,
      'show'=>false,'create'=>true,'edit'=>false,'login'=>Auth::check()]);
  } 

    public function store() {
      if (!Auth::check()) return redirect('/login');
      $title = Input::get('titleName');
      $copyright = Input::get('copyright');
      $edition = Input::get('edition');
      $language = Input::get('language');
      $publisher = Input::get('publisher');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $item = ['titleName'=>$title,'copyright'=>$copyright,
      'edition'=>$edition,'language'=>$language,'publisher'=>$publisher,'pages'=>$pages,'author'=>$author];
      book::create($item);  
      return redirect('Books/index');
    }  

    public function edit($prof_id) {
      if (!Auth::check()) return redirect('/login');
      $prof = DB::table('book')->find($prof_id);
      return view('Books/show',
        ['book'=>$prof,
         'title'=>'Book Edit','courses'=>false,
         'show'=>false,'create'=>false,'edit'=>true,
         'login'=>Auth::check()]);
    }

    public function update($_,$prof_id) {
      if (!Auth::check()) return redirect('/login');
      $title = Input::get('titleName');
      $copyright = Input::get('copyright');
      $edition = Input::get('edition');
      $language = Input::get('language');
      $publisher = Input::get('publisher');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $item = ['titleName'=>$title,'copyright'=>$copyright,
               'edition'=>$edition,'language'=>$language,'publisher'=>$publisher,'pages'=>$pages,'author'=>$author];
      DB::table('book')->update($prof_id,$item);
      return redirect('Books');
    }

    public function destroy($prof_id) {  
      if (!Auth::check()) return redirect('/login');
      DB::table('book')->delete($prof_id);
      return redirect('Books/index');
    }
  }
?>