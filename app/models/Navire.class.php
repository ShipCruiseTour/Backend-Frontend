<?php
class Navire
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getNavires()
    {
        $this->db->query('SELECT * FROM narive');
        $navires = $this->db->fetchAll();
        if ($navires)
            return $navires;
        else
            return false;
    }
    public function getNavire($id)
    {
        $this->db->query('SELECT * FROM narive WHERE id_n = :id');
        $this->db->bind(':id', $id);
        $navire = $this->db->fetch();
        if ($navire)
            return $navire;
        else
            return false;
    }

    public function updateNavire($navire)
    {
        $this->db->query('UPDATE narive SET name_n = :name_navire, nb_ch = :numero_ch, nb_pl = :nb_pl WHERE id_n=:id');
        $this->db->bind(':name_navire', $navire['navireName']);
        $this->db->bind(':numero_ch', $navire['nbr_ch']);
        $this->db->bind(':nb_pl', $navire['nb_pl']);
        $this->db->bind(':id', $navire['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deleteNavire($id)
    {
        $this->db->query('DELETE FROM narive WHERE id_n = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function addNavire($navire)
    { 
        $this->db->query("INSERT INTO narive (name_n, nb_ch , nb_pl) VALUES (:name_navire, :numero_ch,:nb_pl)");
        $this->db->bind(':name_navire', $navire['navireName']);
        $this->db->bind(':numero_ch', $navire['nbr_ch']);
        $this->db->bind(':nb_pl', $navire['nb_pl']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
}