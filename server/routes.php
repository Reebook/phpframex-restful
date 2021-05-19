<?php    
  // file: routes.php  

  Route::resource('server/professor', 'ProfessorController');
  Route::resource('server/author', 'AuthorController');
  Route::resource('server/book', 'BookController');
  Route::resource('server/publisher', 'PublisherController');
  Route::dispatch();
  
?> 
