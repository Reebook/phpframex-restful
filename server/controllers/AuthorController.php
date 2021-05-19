<?php  
  // file: controllers/AuthorController.php 
  require_once('models/AuthorModel.php');

class AuthorController extends Controller {
  
  public function index() {  
    return AuthorModel::all();
  }  
  
  public function store($request) {
    return AuthorModel::create($request);
  }  
  
  public function show($id) {  
    return AuthorModel::find($id);
  }  
  
  public function update($request,$id) {  
    return AuthorModel::update($id,$request);
  }  
  
  public function destroy($id) {  
    return AuthorModel::destroy($id);
  }
}
?>
