<?php

  Route::resource('professor', 'ProfessorController');
  Route::resource('booksOld', 'BookOldController');
  Route::resource('books', 'BookController');  
  Route::get('books/(:number)/delete','BookController@destroy');
  Route::resource('publishers', 'PublisherController');
  Route::get('publishers/(:number)/delete','PublisherController@destroy');
  Route::resource('authors', 'AuthorController');
  Route::get('authors/(:number)/delete','AuthorController@destroy');
  Route::get('/',function() { return view('index'); });
  Route::dispatch();
?>
