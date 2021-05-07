<?php
  // file: controllers/ProfessorController.php

  require_once('models/publisher.php');

  class PublisherController extends Controller {

    public function index() {  
      return view('Publisher/index',
      ['publishers'=>DB::table('publisher')->get(),
      'title'=>'Publisher List','login'=>Auth::check()]);
    }

    public function show($prof_id) {
      $publisher = DB::table('publisher')->find($prof_id);
      return view('Publisher/show',
        ['publishers'=>$publisher,
         'title'=>'Publisher Detail',
         'show'=>true,'create'=>false,'edit'=>false,'login'=>Auth::check()]);
    }

    public function create() {
      if (!Auth::check()) return redirect('/login');
      $publisher = ['name'=>'','country'=>'',
               'founded'=>'','genere'=>''];
      return view('Publisher/show',
      ['title'=>'Publisher Create',
      'publishers'=>$publisher,
      'show'=>false,'create'=>true,'edit'=>false,'login'=>Auth::check()]);
    } 

    public function store() {
      if (!Auth::check()) return redirect('/login');
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
      Publisher::create($item);
      return redirect('/publishers');
    } 

    public function edit($publish_id) {
      if (!Auth::check()) return redirect('/login');
      $publish = DB::table('publisher')->find($publish_id);
      return view('Publisher/show',
        ['publishers'=>$publish,
         'title'=>'Publish Edit',
         'show'=>false,'create'=>false,'edit'=>true,'login'=>Auth::check()]);
    }
 
    public function update($_,$publish_id) {
      if (!Auth::check()) return redirect('/login');
      $name = Input::get('name');    
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');

      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
      DB::table('publisher')->update($publish_id,$item);
      return redirect('/publishers');
    }

    public function destroy($prof_id) {
      if (!Auth::check()) return redirect('/login');  
      DB::table('publisher')->delete($prof_id);
      return redirect('Publishers/index');
    }
  }
?>