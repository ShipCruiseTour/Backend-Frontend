<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>
<div class="formReserve">
    <form class="ReserveForm" action="<?= URLROOT ?>cruises/reserve" method="post">
        <label for="Prix">Prix de croisiere</label>
        <input type="text" disabled name="Prix" value="<?=$data['cruise']->prix_cr?> DH">
        <label for="date">Date de reservation</label>
        <input type="date" name="date" placeholder="Date de reservation" required="required">
        <label for="typeChambre">Type de Chambre</label>
        <select name="typeChambre" class="selectpicker" required="required">
            <option selected disabled>Type de chambre</option>
            <?php foreach ($data['typeCh'] as $typech) : 
            ?>
            <option value="<?= $typech->Prix?>">
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