<?php
class Cruise
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getCruises()
    {
        $this->db->query('SELECT * FROM croisiere');
        $cruises = $this->db->fetchAll();
        if ($cruises)
            return $cruises;
        else
            return false;
    }
    public function getCruise($id)
    {
        $this->db->query('SELECT * FROM croisiere WHERE id_cr = :id');
        $this->db->bind(':id', $id);
        $cruise = $this->db->fetch();
        if ($cruise)
            return $cruise;
        else
            return false;
    }

    public function updateCruise($cruise)
    {
        $this->db->query('UPDATE croisiere SET port_dar = :dariver, port_dep = :depart, image = :image, nb_nuit = :nuit,	prix_cr = prix, date-dep = now() WHERE id_cr=:id');
        $this->db->bind(':dariver', $cruise['portAri']);
        $this->db->bind(':depart', $cruise['portDep']);
        $this->db->bind(':image', $cruise['image']);
        $this->db->bind(':nuit', $cruise['nb_nuit']);
        $this->db->bind(':prix', $cruise['prix']);
        $this->db->bind(':id', $cruise['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deleteCruise($id)
    {
        $this->db->query('DELETE FROM croisiere WHERE id_cr = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function addCruise($cruise)
    { 
        $this->db->query("INSERT INTO croisiere (port_dar, port_dep , image , nb_nuit , prix_cr ,  date-dep) VALUES (:dariver, :depart,:image,:nuit,prix, now())");
        $this->db->bind(':dariver', $cruise['portAri']);
        $this->db->bind(':depart', $cruise['portDep']);
        $this->db->bind(':image', $cruise['image']);
        $this->db->bind(':nuit', $cruise['nb_nuit']);
        $this->db->bind(':prix', $cruise['prix']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
}