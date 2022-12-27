<?php
class Reservation
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getReservations()
    {
        $this->db->query('SELECT * FROM reservation');
        $reservations = $this->db->fetchAll();
        
        if ($reservations)
            return $reservations;
        else
            return false;
    }
    public function getReservation($id)
    {
        $this->db->query('SELECT * FROM reservation WHERE id_re = :id');
        $this->db->bind(':id', $id);
        $reservation = $this->db->fetch();
        if ($reservation)
            return $reservation;
        else
            return false;
    }
        public function getReservationsBuyIdUser($id)
    {
        $this->db->query('SELECT 
                                reservation.*, 
                                chambre.*,
                                croisiere.*,
                                users.*
                          FROM 
                                reservation
                          INNER JOIN 
								chambre
						  ON 
                                chambre.id_ch = reservation.id_ch 
						  INNER JOIN 
                                croisiere 
						  ON 
                                croisiere.id_cr = reservation.id_cr
						  INNER JOIN 
								users 
						  ON 
								users.id_u = reservation.id_user 
                          WHERE 
                                id_user = :id');
        $this->db->bind(':id', $id);
        $reservation = $this->db->fetchAll();
        if ($reservation)
            return $reservation;
        else
            return false;
    }

    public function updateReservation($reservation)
    {
        $this->db->query('UPDATE reservation SET date_re = now(), prix_re = :prix, id_cr = :id_cr, id_user = :id_user, id_ch = :id_ch  WHERE id_re=:id');
        $this->db->bind(':prix', $reservation['prix']);
        $this->db->bind(':id_ch', $reservation['id_cr']);
        $this->db->bind(':id_user', $reservation['id_user']);
        $this->db->bind(':id_ch', $reservation['id_ch']);
        $this->db->bind(':id', $reservation['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deleteReservation($id)
    {
        $this->db->query('DELETE FROM reservation WHERE id_re = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function addReservation($reservation){

        $this->db->query("INSERT INTO reservation (date_re, prix_re , id_cr , id_user,id_ch) VALUES (now(),:dariver, :prix,:id_cr,:id_user,:id_ch)");
        $this->db->bind(':prix', $reservation['prix']);
        $this->db->bind(':id_ch', $reservation['id_cr']);
        $this->db->bind(':id_user', $reservation['id_user']);
        $this->db->bind(':id_ch', $reservation['id_ch']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
}