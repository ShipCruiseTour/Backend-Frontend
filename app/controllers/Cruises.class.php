<?php 
class Cruises extends Controller{

    public function __construct(){
        $this->userCruise = $this->model('Cruise');
    }
    public function index()
    {
        $this->view('cruises/index');
    }    
    public function about()
    {
        $this->view('cruises/about');
    }
    public function contact()
    {
        $this->view('cruises/contact');
    }
        public function place()
    {
        $this->view('cruises/place');
    }
}