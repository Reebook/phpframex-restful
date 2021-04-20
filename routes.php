<?php

  Route::resource('professor', 'ProfessorController');
  Route::resource('books', 'BookController');
  Route::get('/',function() { return view('index'); });
  Route::dispatch();
?>
