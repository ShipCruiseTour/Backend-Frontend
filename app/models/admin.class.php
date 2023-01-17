<?php
class Admin extends Controller
{

    private $db; //database
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE Email = :email AND Role = 1");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount()) return true;
        else
            return false;
    }
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE Email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        $hashed_password = $row->Password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    public function countItems($item, $table)
    {

        $this->db->query("SELECT COUNT($item) FROM $table");

        $this->db->execute();

        return $this->db->fetchColumn();
    }

    public function getUsers()
    {
        $this->db->query('SELECT * FROM users');
        $users = $this->db->fetchAll();

        if ($users)
            return $users;
        else
            return false;
    }
    public function getReservations()
    {
        $this->db->query('SELECT 
                                *
                            FROM 
                                narive na , 
                                reservation re ,
                                users us,
                                croisiere co
                            where 
                                re.id_cr = co.id_cr
                            and 
                                re.id_user = us.id_u
                            and
                                na.id_n = co.id_nav');
        $reservations = $this->db->fetchAll();
        if ($reservations)
        return $reservations;
    else
        return false;
    }
    public function getCruises()
    {
        $this->db->query('SELECT 
                                *, PO.nameP as nameP_d , PP.nameP as nameP_a
                            FROM 
                                port PO , 
                                port PP , 
                                croisiere co , 
                                narive na 
                            where 
                                co.port_dep=PO.id_p 
                            and 
                                co.port_dar=PP.id_p 
                            and 
                                co.id_nav = na.id_n');
        $cruises = $this->db->fetchAll();
        if ($cruises)
            return $cruises;
        else
            return false;
    }
}
