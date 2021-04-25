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
      return view('Books/show',
        ['book'=>$prof,
         'title'=>'book Detail',
         'show'=>true,'create'=>false,'edit'=>false]);
    }

    public function create() {
      $prof = ['name'=>'','degree'=>'',
               'email'=>'','phone'=>''];
    return view('Books/show',
      ['title'=>'book Create',
      'book'=>$prof,'courses'=>false,
      'show'=>false,'create'=>true,'edit'=>false]);
  } 

    public function store() {
      $title = Input::get('titleName');
      $copyright = Input::get('copyright');
      $edition = Input::get('edition');
      $language = Input::get('language');
      $publisher = Input::get('publisher');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $item = ['title'=>$name,'copyright'=>$copyright,
      'edition'=>$edition,'language'=>$language,'publisher'=>$publisher,'pages'=>$pages,'author'=>$author];
      book::create($item);
      return redirect('Books/index');
    }  

    public function edit($prof_id) {
      $prof = DB::table('book')->find($prof_id);
      return view('Books/show',
        ['book'=>$prof,
         'title'=>'book Edit','courses'=>false,
         'show'=>false,'create'=>false,'edit'=>true]);
    }

    public function update($_,$prof_id) {
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
      return redirect('Books/index');
    }

    public function destroy($prof_id) {  
      DB::table('book')->destroy($prof_id);
      return redirect('Books/index');
    }
  }
?>