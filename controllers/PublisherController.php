<?php
  // file: controllers/ProfessorController.php

  require_once('models/publisher.php');

  class PublisherController extends Controller {

    public function index() {  
      return view('Publisher/index',
      ['publishers'=>DB::table('publisher')->get(),
      'title'=>'Publisher List']);
    }

    public function show($prof_id) {
      $prof = DB::table('publisher')->find($prof_id);
      return view('Publisher/show',
        ['publishers'=>$prof,
         'title'=>'Publisher Detail',
         'show'=>true,'create'=>false,'edit'=>false]);
    }

    public function create() {
      $publisher = ['name'=>'','country'=>'',
               'founded'=>'','genere'=>''];
      return view('Publisher/show',
      ['title'=>'Publisher Create',
      'publishers'=>$publisher,
      'show'=>false,'create'=>true,'edit'=>false]);
    } 

    public function store() {
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
      Publisher::create($item);
      return redirect('/publisher');
    } 

    public function edit($publish_id) {
      $publish = DB::table('publisher')->find($publish_id);
      return view('Publisher/show',
        ['publishers'=>$publish,
         'title'=>'Publish Edit',
         'show'=>false,'create'=>false,'edit'=>true]);
    }

    public function update($_,$publish_id) {
      $name = Input::get('name');    
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');

      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
      DB::table('publisher')->update($publish_id,$item);
      return redirect('Publisher');
    }

    public function destroy($prof_id) {  
      DB::table('publisher')->delete($prof_id);
      return redirect('Publisher/index');
    }
  }
?>