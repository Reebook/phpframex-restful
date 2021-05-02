<?php

  Route::resource('professor', 'ProfessorController');
  Route::resource('booksOld', 'BookOldController');
  Route::resource('books', 'BookController');  
  Route::get('books/(:number)/delete','BookController@destroy');
  Route::resource('publishers', 'PublisherController');
  Route::resource('authors', 'AuthorController');
  Route::get('/',function() { return view('index'); });
  Route::dispatch();
?>
