<?php
class Port
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPorts()
    {
        $this->db->query('SELECT * FROM port');
        $ports = $this->db->fetchAll();
        if ($ports)
            return $ports;
        else
            return false;
    }
    public function getPort($id)
    {
        $this->db->query('SELECT * FROM port WHERE id_p = :id');
        $this->db->bind(':id', $id);
        $port = $this->db->fetch();
        if ($port)
            return $port;
        else
            return false;
    }

    public function updatePort($port)
    {
        $this->db->query('UPDATE port SET nameP = :np WHERE id_p=:id');
        $this->db->bind(':np', $port['namePort']);
        $this->db->bind(':id', $port['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deletePort($id)
    {
        $this->db->query('DELETE FROM port WHERE id_p = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function addPort($port)
    { 
        $this->db->query("INSERT INTO port (nameP) VALUES (:np)");
        $this->db->bind(':np', $port);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
}