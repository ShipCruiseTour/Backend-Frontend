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
        $this->db->query('SELECT * FROM croisiere
        WHERE (YEAR(date_dep) = YEAR(NOW()) AND  MONTH(date_dep) = MONTH(NOW()) AND DAY(date_dep) >= DAY(NOW()))
        OR (YEAR(date_dep) = YEAR(NOW()) AND MONTH(date_dep) > MONTH(NOW()))
        OR (YEAR(date_dep) > YEAR(NOW()))');
        $cruises = $this->db->fetchAll();

        if ($cruises) {
            return $cruises;
        } else {
            return false;
        }

    }
    public function getLast4Cruises()
    {
        $this->db->query('SELECT * FROM croisiere ORDER BY id_cr DESC LIMIT 4');
        $cruises = $this->db->fetchAll();

        if ($cruises) {
            return $cruises;
        } else {
            return false;
        }

    }
    public function getCruise($id)
    {
        $this->db->query('SELECT * FROM croisiere WHERE id_cr = :id');
        $this->db->bind(':id', $id);
        $cruise = $this->db->fetch();
        if ($cruise) {
            return $cruise;
        } else {
            return false;
        }

    }

    public function updateCruise($cruise)
    {
        $this->db->query('UPDATE croisiere SET port_dar = :dariver, port_dep = :depart, image = :image, nb_nuit = :nuit,	prix_cr = :prix, date_dep = now() ,name_cr = :name_croisiere , id_nav = :id_navire  WHERE id_cr=:id');
        $this->db->bind(':dariver', $cruise['portAri']);
        $this->db->bind(':depart', $cruise['portDep']);
        $this->db->bind(':image', $cruise['image']);
        $this->db->bind(':nuit', $cruise['nb_nuit']);
        $this->db->bind(':prix', $cruise['prix']);
        $this->db->bind(':name_croisiere', $cruise['name_cr']);
        $this->db->bind(':id_navire', $cruise['id_nav']);
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
    public function addCruise($navire, $poDe,$trager, $poDa, $prix, $dateDe, $image, $nb_nuit, $name_cr)
    {
        $this->db->query("INSERT INTO croisiere (port_dar, port_dep , image , nb_nuit , prix_cr ,  date_dep, name_cr,id_nav,trager) VALUES (:dariver, :depart,:image,:nuit,:prix, :date_dep,:name_croisiere ,:id_navire,:trager)");
        $this->db->bind(':dariver', $poDa);
        $this->db->bind(':depart', $poDe);
        $this->db->bind(':image', $image);
        $this->db->bind(':nuit', $nb_nuit);
        $this->db->bind(':prix', $prix);
        $this->db->bind(':name_croisiere', $name_cr);
        $this->db->bind(':id_navire', $navire);
        $this->db->bind(':date_dep', $dateDe);
        $this->db->bind(':trager', $trager);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    public function showCruise($id)
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
                                co.id_nav = na.id_n
                            and
                                id_cr = :id');
        $this->db->bind(':id', $id);
        $cruise = $this->db->fetch();
        if ($cruise) {
            return $cruise;
        } else {
            return false;
        }

    }
    public function chercher($sqlEnd)
    {

        $sql = "SELECT * FROM croisiere" . $sqlEnd;
        $this->db->query($sql);
        $this->db->execute();
        $this->db->fetchAll();
        return $this->db->fetchAll();
    }
}