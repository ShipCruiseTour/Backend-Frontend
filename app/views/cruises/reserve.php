<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>
<div class="formReserve">
    <form class="ReserveForm" action="<?= URLROOT ?>cruises/ticket" method="post">
        <input type="hidden" name="id_cr" value="<?=$data['cruise']->id_cr?>">
        <label for="Prix">Prix de croisiere</label>
        <input type="text" readonly  name="prix" value="<?=$data['cruise']->prix_cr?> DH">
        <label for="date">Date de reservation</label>
        <input id = "date_reservation" type="date" name="date" placeholder="Date de reservation" required="required">
        <label for="prixChambre">Type de Chambre</label>
        <select name="id_prixChambre" class="selectpicker" required="required">
            <option selected disabled>Type de chambre</option>
            <?php foreach ($data['typeCh'] as $typech) : 
            ?>
            <option value="<?=$typech->id_t_ch . ' ' . $typech->Prix?>">
                <?= $typech->Name .':'. $typech->Prix .' DH'?>
            </option>
            <?php  endforeach 
            ?>
        </select>
        <div class="reserveSubmit">
            <input class="btn btnMe btnMe3" type="submit" value="Reserve">
        </div>
    </form>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>