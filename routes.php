<?php
    
    Route::get('/',function() {  view('libro'); });
    Route::get('libros/',function() { view('libro');});
    Route::get('libro1/',function() { view('libro1');});
    Route::get('libro2',function() { view('libro2');});
    Route::get('libro3',function() { view('libro3');});
    Route::get('libro4',function() { view('libro4');});
    Route::get('libros/(:number)', function($id) {
      //  echo 'The id is: ' . $id;
      
        switch($id){
            case 1:
             view('libro1');
                break;
            case 2:
                view('libro'.$id);
                break;
            case 3:
                view('libro-'.$id);
                break;
            case 4:
                view('libro-'.$id);
                break;
            default:
                view('libro');
                break;
        }
      });
    Route::dispatch();
?>
