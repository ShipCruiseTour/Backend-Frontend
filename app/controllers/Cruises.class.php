<?php
class Cruises extends Controller
{

    private $cruiseModel;
    private $portModel;
    private $typechambreModel;
    private $navireModel;
    private $reservationModel;
    private $chambreModel;
    public function __construct()
    {

        $this->cruiseModel = $this->model('Cruise');
        $this->portModel = $this->model('Port');
        $this->typechambreModel = $this->model('Typechambre');
        $this->navireModel = $this->model('Navire');
        $this->reservationModel = $this->model('Reservation');
        $this->chambreModel = $this->model('Chambre');
    }
    public function index()
    {
        // get the last 4 Cruise
        $cruises = $this->cruiseModel->getLast4Cruises();
        if ($cruises) {
            $data = [
                'cruises' => $cruises
            ];
            $this->view('cruises/index', $data);
        } else {
            include_once APPROOT . '/views/inc/header.inc.php';
            include_once APPROOT . '/views/inc/navbarUser.inc.php';
            die('cruise not found');
        }
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
            $this->view('cruises/place', $data);
        } else {
            include_once APPROOT . '/views/inc/header.inc.php';
            include_once APPROOT . '/views/inc/navbarUser.inc.php';
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
            $this->view('cruises/reservationCle', $data);
        } else {
            include_once APPROOT . '/views/inc/header.inc.php';
            include_once APPROOT . '/views/inc/navbarUser.inc.php';
            echo ('reservations not found');
        }
    }
    public function deleteReservation($id_resrvation)
    {
        $reservation = $this->reservationModel->getReservation($id_resrvation);
        $date = $reservation->date_re;
        $dateArray = explode('-', $date);
        $annee = $dateArray[0];
        $mois = $dateArray[1];
        $jour = $dateArray[2];
        $anneeActuelle = date('y');
        $moisActuelle = date('m');
        $jourActuelle = date('d');

        if ($annee >= $anneeActuelle) {
            if ($mois >= $moisActuelle) {
                if (($jour - $jourActuelle) >= 2) {
                    $this->reservationModel->deleteReservation($id_resrvation);
                    $this->view('cruises/index');
                } else {
                    include_once APPROOT . '/views/inc/header.inc.php';
                    include_once APPROOT . '/views/inc/navbarUser.inc.php';
                    echo 'You can not delete reservation';
                    redirectTime('cruises/reservationCle');
                }
            }
        }
    }
    public function show($id)
    {
        $cruise = $this->cruiseModel->showCruise($id);
        if ($cruise) {
            $data = [
                'cruise' => $cruise
            ];
            $this->view('cruises/show', $data);
        } else {
            include_once APPROOT . '/views/inc/header.inc.php';
            include_once APPROOT . '/views/inc/navbarUser.inc.php';
            echo ('cruise not found');
        }
    }

    public function reserve($id)
    {
        $cruise = $this->cruiseModel->getCruise($id);
        $typeCh = $this->typechambreModel->getTypechambres();
        if ($cruise) {
            $data = [
                'cruise' => $cruise,
                'typeCh' => $typeCh
            ];
            $this->view('cruises/reserve', $data);
        } else {
            include_once APPROOT . '/views/inc/header.inc.php';
            include_once APPROOT . '/views/inc/navbarUser.inc.php';
            echo ('cruise not found');
        }
    }

    public function ticket()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('users/login');
        } else {
            $chambre = $_POST['id_prixChambre'];
            $id_Prix = explode(" ", $chambre);
            $id_t_ch = $id_Prix[0];
            $prix_ch = $id_Prix[1];
            $date_re = $_POST['date'];
            $prix = (float)$_POST['prix'] + (float)$prix_ch;
            $id_cr = $_POST['id_cr'];
            $id_user = $_SESSION['user_id'];

            $this->chambreModel->addChambre($id_t_ch);

            $chambreInfo = $this->chambreModel->getChambreByTypeId($id_t_ch);

            $id_ch = $chambreInfo->id_ch;

            $reservation = [
                'date_re' => $date_re,
                'prix' => $prix,
                'id_cr' => $id_cr,
                'id_user' => $id_user,
                'id_ch' => $id_ch
            ];
            $this->reservationModel->addReservation($reservation);
            redirect('cruises/reservationCle');
        }
    }
}
