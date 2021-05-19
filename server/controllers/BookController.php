<?php  
  // file: controllers/BookController.php 
  require_once('models/BookModel.php');

class BookController extends Controller {
  
  public function index() {  
    return BookModel::all();
  }  
  
  public function store($request) {
    return BookModel::create($request);
  }  
  
  public function show($id) {  
    return BookModel::find($id);
  }  
  
  public function update($request,$id) {  
    return BookModel::update($id,$request);
  }  
  
  public function destroy($id) {  
    return BookModel::destroy($id);
  }
}
?>
