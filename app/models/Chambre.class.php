<?php
class Chambre
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addChambre($id_t_ch)
    { 
        $this->db->query("INSERT INTO chambre (type_ch) VALUES (:id_t_ch)");
        $this->db->bind(':id_t_ch', $id_t_ch);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }

    public function getChambreByTypeId($id_t_ch)
    {
        $this->db->query('SELECT * FROM `chambre` WHERE `chambre`.`type_ch` = :id_t_ch ORDER BY `chambre`.`id_ch` DESC ');
        $this->db->bind(':id_t_ch', $id_t_ch);
        $chambre = $this->db->fetch();
        if ($chambre)
            return $chambre;
        else
            return false;
    }
}