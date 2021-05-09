<?php

  // file: controllers/LoginController.php
  require_once('models/UserModel.php');

  class LoginController extends Controller {

    public function showLoginForm() {
      return view('Auth/Login',
        ['error'=>false,'login'=>auth::check()]);
    }

    public function login() {
      $email = Input::get('email');   
      $password = Input::get('password');
      if (Auth::attempt(['email' => $email,
        'password' => $password])) {
        return redirect('books');
      }
      return redirect('/loginFails');
    }

    public function loginFails() {
      return view('Auth/login',
        ['error'=>true,'login'=>auth::check()]);
    }

    public function logout() {
      Auth::logout();
      return redirect('books');
    }
  }
?>
