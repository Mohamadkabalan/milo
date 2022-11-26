<?php
Namespace App\Http\Controllers;

class HomeController extends Controller{

  public $_config;

  public function __construct() {
     $this->_config=request('_config');
  }

  public function index(){
    return view($this->_config['view']);
  }

}

?>