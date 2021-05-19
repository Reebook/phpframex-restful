<?php  
  // file: controllers/AuthorController.php 
  require_once('models/PublisherModel.php');

class PublisherController extends Controller {
  
  public function index() {  
    return PublisherModel::all();
  }  
  
  public function store($request) {
    return PublisherModel::create($request);
  }  
  
  public function show($id) {  
    return PublisherModel::find($id);
  }  
  
  public function update($request,$id) {  
    return PublisherModel::update($id,$request);
  }  
  
  public function destroy($id) {  
    return PublisherModel::destroy($id);
  }
}
?>
