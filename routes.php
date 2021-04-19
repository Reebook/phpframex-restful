<?php

  Route::resource('professor', 'ProfessorController');

    Route::get('/',function() {  echo 'Hello World'; });
    Route::get('libros',function() { view('libro');});
    Route::get('libro1',function() { view('libro1');});
    Route::get('libro2',function() { view('libro2');});
    Route::get('libro3',function() { view('libro3');});
    Route::get('libro4',function() { view('libro4');});
    
    Route::dispatch();
?>
