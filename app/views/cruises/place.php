<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>
<form action="<?php echo URLROOT; ?>cruises/trie" method="post">
    <div class="selects">
        <!-- <input type="date" id="date_reservation" name="date" placeholder="Date"> -->
        <select name="date" class="selectpicker">
            <option selected value="0">Mois</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <select class="selectpicker" name="Navire">
            <option selected value="0">Narive</option>
            <?php foreach ($data['navires'] as $navire): ?>
                <option value="<?=$navire->id_n?>"><?=$navire->name_n?></option>
            <?php endforeach?>
        </select>
        <select class="selectpicker" name="PortArr">
            <option selected value="0">Port d'arrivée</option>
            <?php foreach ($data['ports'] as $port): ?>
                <option value="<?=$port->id_p?>"><?=$port->nameP?></option>
            <?php endforeach?>
        </select>
        <select class="selectpicker" name="PortDep">
            <option selected value="0">Port départ</option>
            <?php foreach ($data['ports'] as $port): ?>
                <option value="<?=$port->id_p?>"><?=$port->nameP?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Chercher">
    </div>
</form>
<div class="croisieres">
    <?php
$i = 0;
foreach ($data['cruises'] as $cruise): ?>
        <div class="card" id="cardHidden<?=$i?>" style="width: 13rem;">
            <input type="hidden" id="cruiseHidden<?=$i?>" value="<?=$cruise->date_dep?>">
            <img src="<?=URLROOT?>image/<?=$cruise->image?>" class="card-img-top" alt="croisiere">
            <div class="card-body">
                <h5 style="color: black;" class="card-title">
                    <?=$cruise->name_cr?>
                </h5>
                <div class="d-flex justify-content-center">
                    <a href="<?=URLROOT?>cruise/show/<?=$cruise->id_cr?>" class="btn btnMe">VIEW</a>
                </div>
            </div>
        </div>
    <?php
$i++;
endforeach?>
    <input type="hidden" id="taille" value="<?=$i?>">
</div>
<div id="pagination"></div>
<?php include_once APPROOT . '/views/inc/footer.inc.php'?>