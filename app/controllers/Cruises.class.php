<?php 
class Cruises extends Controller{

    public function __construct(){
        $this->cruiseModel = $this->model('Cruise');
        $this->portModel = $this->model('port');
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
        // get the Cruise
        $cruises = $this->cruiseModel->getCruises();
        $ports = $this->portModel->getPorts();
        if ($cruises) {
            $data = [
                'cruises' => $cruises,
                'ports' => $ports,
            ];
            $this->view('cruises/place',$data);
        } else {
            echo('cruise not found');
        }
        
    }
}