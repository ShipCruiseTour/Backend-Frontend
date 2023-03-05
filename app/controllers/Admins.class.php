<?php
class Admins extends Controller
{
    private $adminModel;
    private $portModel;
    private $navireModel;
    private $cruiseModel;
    private $typeRoomModel;
    public function __construct()
    {
        $this->adminModel = $this->model('admin');
        $this->portModel = $this->model('Port');
        $this->navireModel = $this->model('navire');
        $this->cruiseModel = $this->model('cruise');
        $this->typeRoomModel = $this->model('Typechambre');
    }
    public function test()
    {
        $this->view('admins/test');
    }
    public function index()
    {
        if ($_SESSION['user_id'] != null) {
            redirect('admins/dashboard');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'email' => $_POST['userEmail'],
                    'password' => $_POST['userPassword'],
                    'email_err' => '',
                    'password_err' => ''
                ];
                // check if email exist
                if (!$this->adminModel->getUserByEmail($data['email'])) {
                    $data['email_err'] = 'User not exist';
                }
                if (empty($data['email'])) $data['email_err'] = 'Please enter email';
                if (empty($data['password'])) $data['password_err'] = 'Please enter password';

                if (empty($data['email_err']) && empty($data['password_err'])) {
                    $user = $this->adminModel->login($data['email'], $data['password']);
                    if ($user) {
                        // set The sessions
                        $_SESSION['user_id'] = $user->id_u;
                        $_SESSION['user_name'] = $user->userName;

                        redirect('admins/dashboard');
                    } else {
                        // password incorrect
                        $data['password_err'] = 'Password Incorrect';
                        $this->view('admins/index', $data);
                    }
                } else {
                    // user register failed
                    $this->view('admins/index', $data);
                }
            } else {
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm-password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm-password_err' => ''
                ];

                // load the register
                $this->view('admins/index', $data);
            }
        }
    }
    public function dashboard()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $member = $this->adminModel->countItems('id_u', 'users');
            $cruise = $this->adminModel->countItems('id_cr', 'croisiere');
            $reservation = $this->adminModel->countItems('id_re', 'reservation');
            $navire = $this->adminModel->countItems('id_n', 'narive');
            $data = [
                'usersMember' => $member,
                'cruiseMember' => $cruise,
                'reservationMember' => $reservation,
                'navireMember' => $navire
            ];
            $this->view('admins/dashboard', $data);
        }
    }
    public function users()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $users = $this->adminModel->getUsers();
            $data = [
                'users' => $users
            ];
            $this->view('admins/users', $data);
        }
    }
    public function croisiere()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $croisieresGlobal = [];
            $croisieres = $this->adminModel->getCruises();
            for ($i=0; $i < count($croisieres); $i++) { 
                $idPortsTrager[$i] = $croisieres[$i]->trager;
                unset($croisieres[$i]->trager);
                
                $idPortsTragerArr[$i] = explode(',',$idPortsTrager[$i]);
                $namePortsTragerArr[$i] = [];
                for ($j=0; $j < count($idPortsTragerArr[$i]) ; $j++) { 
                    $namePortTrager[$j]=$this->portModel->getPortByIdReturnName($idPortsTragerArr[$i][$j]);
                    array_push ($namePortsTragerArr[$i] , $namePortTrager[$j]);
                }
                $trajerCruise[$i] = '';
                for($t=0;$t<count($namePortsTragerArr[$i]);$t++){
                    $trajerCruise[$i] = $trajerCruise[$i] . ' ' . $namePortsTragerArr[$i][$t]. ' ';                    
                }
                $croisieres[$i]->trager = $trajerCruise[$i];
                array_push ($croisieresGlobal , $croisieres[$i]);
            }
            $data = [
                'croisieres' => $croisieresGlobal
            ];
            
            $count = $this->adminModel->countItems('id_cr','croisiere');
            if ($count == 0) {
                include_once APPROOT . '/views/inc/header.inc.php';
                include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
                $noFooter = '';

                echo '<h1 class="text-center">Manage croisiere</h1>';
                echo '<div class="container">';
                    echo '<a href="'.URLROOT.'admins/croisiereAdd" class="btn btn-sm btn-primary">';
                        echo '<i class="fa fa-plus"></i> New cruise';
                    echo '</a>';
                echo '</div>';

                include_once APPROOT . '/views/inc/footer.inc.php';
            } else {
                $this->view('admins/croisiere', $data);
            }
        }
    }
    public function navire()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $narives = $this->navireModel->getNavires();
            $data = [
                'narives' => $narives
            ];
            $count = $this->adminModel->countItems('id_n','narive');
            if ($count == 0) {
                include_once APPROOT . '/views/inc/header.inc.php';
                include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
                $noFooter = '';

                echo '<h1 class="text-center">Manage Narive</h1>';
                echo '<div class="container">';
                    echo '<a href="'.URLROOT.'admins/navireAdd" class="btn btn-sm btn-primary">';
                    echo '<i class="fa fa-plus"></i> New narive';
                    echo '</a>';
                echo '</div>';

                include_once APPROOT . '/views/inc/footer.inc.php';
            } else {
                $this->view('admins/navire', $data);
            }
        }
    }
    public function port()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $ports = $this->portModel->getPorts();
            $data = [
                'ports' => $ports
            ];
            $count = $this->adminModel->countItems('id_p','port');
            if ($count == 0) {
                include_once APPROOT . '/views/inc/header.inc.php';
                include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
                $noFooter = '';

                echo '<h1 class="text-center">Manage Port</h1>';
                echo '<div class="container">';
                    echo '<a href="'.URLROOT.'admins/portAdd" class="btn btn-sm btn-primary">';
                    echo '<i class="fa fa-plus"></i> New port';
                    echo '</a>';
                echo '</div>';

                include_once APPROOT . '/views/inc/footer.inc.php';
            } else {
                $this->view('admins/port', $data);
            }
        }
    }

    public function typeChambre()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $typeChambres = $this->typeRoomModel->getTypechambres();
            $data = [
                'typeChambres' => $typeChambres
            ];
            $count = $this->adminModel->countItems('id_t_ch','typechambre');
            if ($count == 0) {
                include_once APPROOT . '/views/inc/header.inc.php';
                include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
                $noFooter = '';

                echo '<h1 class="text-center">Manage Type Chambre</h1>';
                echo '<div class="container">';
                    echo '<a href="'.URLROOT.'admins/typeChambreAdd" class="btn btn-sm btn-primary">';
                    echo '<i class="fa fa-plus"></i> New Type Chambre';
                    echo '</a>';
                echo '</div>';

                include_once APPROOT . '/views/inc/footer.inc.php';
            } else {
                $this->view('admins/typeChambre', $data);
            }
        }
    }

    public function reservation()
    {
        if ($_SESSION['user_id'] == null) {
            redirect('admins');
        } else {
            $reservations = $this->adminModel->getReservations();
            $data = [
                'reservations' => $reservations
            ];
            $count = $this->adminModel->countItems('id_re','reservation');
            if ($count == 0) {
                include_once APPROOT . '/views/inc/header.inc.php';
                include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
                $noFooter = '';        
                echo '<h1 class="text-center">Manage Reservation</h1>';
                echo '<div class="container">';
                    echo '<div class="table-responsive">';
                        echo '<table class="main-table text-center table table-bordered">';
                            echo '<tr>';
                                echo '<td>#ID Reservation</td>';
                                echo '<td>Narive</td>';
                                echo '<td>date Reservation</td>';
                                echo '<td>prix Reservation</td>';
                                echo '<td>Utilisateur</td>';
                            echo '</tr>';
                        echo '</table>';
                    echo '</div>';
                echo '</div>';
                include_once APPROOT . '/views/inc/footer.inc.php';
            } else {
            $this->view('admins/reservation', $data);
            }
        }
    }

    public function navireDelete($id)
    {
        $this->navireModel->deletenavire($id);
        redirectHome('back');
    }
    public function navireAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $navire = [
                'navireName' =>$_POST['nameN'],
                'nbr_ch' =>$_POST['nb_ch'],
                'nb_pl' =>$_POST['nb_pl']
            ];
            $this->navireModel->addnavire($navire);
            redirect('admins/navire');
        } else {
            $this->view('admins/addNavire');
        }
    }
    public function croisiereDelete($id)
    {
        $this->cruiseModel->deleteCruise($id);
        redirectHome('back');
    }
    public function croisiereAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $navire = $_POST['navire'];
            $pos = $_POST['posSelected'];
            $posArr = explode(',', $pos);
            $prix = $_POST['prix'];
            $dateDe = $_POST['dateDe'];
            $image = $_FILES['img']['name'];
            $nb_nuit = $_POST['nb_nuit'];
            $name_cr = $_POST['name_cr'];

            $poDe = $posArr[0];
            $trager = $posArr[1];
            $poDa = $posArr[count($posArr)-1];
            for ($i=2; $i <count($posArr)-1 ; $i++) { 
                $trager = $trager . ',' . $i;
            }

            $this->cruiseModel->addCruise($navire,$poDe,$trager,$poDa,$prix,$dateDe,$image,$nb_nuit,$name_cr);
            redirect('admins/croisiere');
        }
        else{
            $navires = $this->navireModel->getNavires();
            $ports = $this->portModel->getPorts();
            $data = [
                'navires' => $navires,
                'ports' => $ports
            ];
            $this->view('admins/addCroisiere',$data);
        }
    }
    public function portDelete($id)
    {
        $this->portModel->deletePort($id);
        redirectHome('back');
    }
    public function portAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['nameP'];
            $this->portModel->addPort($name);
            redirect('admins/port');
        }
        else{
            $this->view('admins/addPort');
        }
    }
    public function typeChambreAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['Name'];
            $prix = $_POST['Prix'];
            $this->typeRoomModel->addTypechambre($name , $prix);
            redirect('admins/typeChambre');
        }
        else{
            $this->view('admins/addTypeChambre');
        }
    }

    public function typeChambreDelete($id)
    {
        $this->typeRoomModel->deleteTypechambre($id);
        redirectHome('back');
    }

    public function logout()
    {
        $_SESSION['users_id'] = null;
        $_SESSION['name'] = null;
        session_destroy();
        redirect('admins');
    }
}