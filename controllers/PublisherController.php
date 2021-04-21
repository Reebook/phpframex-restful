<?php
  // file: controllers/ProfessorController.php

  require_once('Publisher.php');

  class PublisherController extends Controller {

    public function index() {  
      return view('Publisher/index',
       ['publishers'=>Publisher::all(),
        'title'=>'Publisher List']);
    }

    public function show($id) {
      $publisher = Publisher::find($id);
      return view('Publisher/show',
        ['publisher'=>$publisher,
         'title'=>'Publisher Detail']);
    }
  }
?>