<?php 
class Cruises extends Controller{

    public function __construct(){
        $this->cruiseModel = $this->model('Cruise');
        $this->portModel = $this->model('Port');
        $this->typechambreModel = $this->model('Typechambre');
        $this->navireModel = $this->model('Navire');
        $this->reservationModel = $this->model('Reservation');
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
        $navires = $this->navireModel->getNavires();
        $typeCh = $this->typechambreModel->getTypechambres();
        if ($cruises) {
            $data = [
                'cruises' => $cruises,
                'ports' => $ports,
                'navires' => $navires,
                'typeCh' => $typeCh,
            ];
            $this->view('cruises/place',$data);
        } else {
            die('cruise not found');
        }
        
    }
        public function reservationCle()
    {
        // get the Cruise
        $reservations = $this->reservationModel->getReservationsBuyIdUser($_SESSION['user_id']);
        if ($reservations) {
            $data = [
                'reservations' => $reservations,
            ];
            $this->view('cruises/reservationCle',$data);
        } else {
            echo('reservations not found');
        }
        
    }
    public function deleteReservation($id_resrvation)
    {
        $this->reservationModel->deleteReservation($id_resrvation);
        $this->view('cruises/index');
    }
    public function show($id)
    {  
        $cruise = $this->cruiseModel->showCruise($id);
        if ($cruise) {
            $data = [
                'cruise' => $cruise
            ];
            $this->view('cruises/show',$data);
        } else {
            echo('cruise not found');
        }
    }

    public function reserve($id)   
    {
        echo 'hi';
    }
}