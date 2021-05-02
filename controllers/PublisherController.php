<?php
  // file: controllers/ProfessorController.php

  require_once('Publisher.php');

  class PublisherController extends Controller {

    public function index() {  
      return view('Publisher/index',
      ['books'=>DB::table('publisher')->get(),
      'title'=>'Publisher List']);
    }

    public function show($prof_id) {
      $prof = DB::table('publisher')->find($prof_id);
      return view('publisher/show',
        ['book'=>$prof,
         'title'=>'Publisher Detail',
         'show'=>true,'create'=>false,'edit'=>false]);
    }
  }
?>