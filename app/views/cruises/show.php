<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>

<div class="view">
    <div class="imgCroisiere">
        <img src="<?=URLROOT?>image/<?=$data['cruise']->image?>" alt="Croisiére">
    </div>
    <div class="INFO">
        <div class="info">
            <span>Name Croisiere : <?=$data['cruise']->name_cr?></span>
            <span>Prix : <?=$data['cruise']->prix_cr?> DH</span>
            <span>Port Départ : <?=$data['cruise']->nameP_d?></span>
            <span>Port D'arrivée : <?=$data['cruise']->nameP_a?></span>
            <span>Nombre De Personne : <?=$data['cruise']->nb_pl?></span>
            <span>Nombre De chambre : <?=$data['cruise']->nb_ch?></span>
        </div>
    </div>
</div>
<div class="inputReserve d-flex justify-content-center my-4">
    <a class="btn btnMe btnMe3" href="<?= URLROOT?>cruise/reserve/<?= $data['cruise']->id_cr ?>">RESERVER</a>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>