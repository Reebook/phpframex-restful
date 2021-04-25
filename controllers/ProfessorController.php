<?php
  // file: controllers/ProfessorController.php

  require_once('models/professor.php');

  class ProfessorController extends Controller {

    public function index() {  
      return view('professor/index',
      ['professors'=>DB::table('professor')->get(),
      'title'=>'Professors List']);
    }
    public function show($prof_id) {
      $prof = DB::table('professor')->find($prof_id);
      return view('professor/show',
        ['professor'=>$prof,
         'title'=>'Professor Detail',
         'show'=>true,'create'=>false,'edit'=>false]);
    }

    public function create() {
      $prof = ['name'=>'','degree'=>'',
               'email'=>'','phone'=>''];
    return view('professor/details',
      ['title'=>'Professor Create',
      'professor'=>$prof,'courses'=>false,
      'show'=>false,'create'=>true,'edit'=>false]);
  } 

    public function store() {
      $name = Input::get('name');
      $degree = Input::get('degree');
      $email = Input::get('email');
      $phone = Input::get('phone');
      $item = ['name'=>$name,'degree'=>$degree,
               'email'=>$email,'phone'=>$phone];
      Professor::create($item);
      return redirect('/professor');
    }  

    public function edit($prof_id) {
      $prof = DB::table('professor')->find($prof_id);
      return view('professor/show',
        ['professor'=>$prof,
         'title'=>'Professor Edit','courses'=>false,
         'show'=>false,'create'=>false,'edit'=>true]);
    }

    public function update($_,$prof_id) {
      $name = Input::get('name');
      $degree = Input::get('degree');
      $email = Input::get('email');
      $phone = Input::get('phone');
      $prof = ['name'=>$name,'degree'=>$degree,
               'email'=>$email,'phone'=>$phone];
      DB::table('professor')->update($prof_id,$prof);
      return redirect('/professor');
    }

    public function destroy($prof_id) {  
      DB::table('professor')->destroy($prof_id);
      return redirect('/professor');
    }
  }
?>