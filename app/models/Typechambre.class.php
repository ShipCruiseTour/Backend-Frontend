<?php
class Typechambre
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getTypechambres()
    {
        $this->db->query('SELECT * FROM typechambre');
        $typechambres = $this->db->fetchAll();
        
        if ($typechambres)
            return $typechambres;
        else
            return false;
    }
    public function getTypechambre($id)
    {
        $this->db->query('SELECT * FROM typechambre WHERE id_t_ch = :id');
        $this->db->bind(':id', $id);
        $typechambre = $this->db->fetch();
        if ($typechambre)
            return $typechambre;
        else
            return false;
    }

    public function updateTypechambre($typechambre)
    {
        $this->db->query('UPDATE typechambre SET Name = :name, Prix = :Prix, Capacite = :nbre_per WHERE id_t_ch=:id');
        $this->db->bind(':name', $typechambre['portDep']);
        $this->db->bind(':Prix', $typechambre['Prix']);
        $this->db->bind(':nbre_per', $typechambre['Capacite']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deleteTypechambre($id)
    {
        $this->db->query('DELETE FROM typechambre WHERE id_t_ch = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function addTypechambre($name , $prix)
    { 
        $this->db->query("INSERT INTO typechambre (Name , Prix) VALUES (:name,:Prix)");
        $this->db->bind(':name', $name);
        $this->db->bind(':Prix', $prix);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
}