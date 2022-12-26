<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>
<div class="selects">
    <select class="selectpicker">
        <option selected disabled>Type de chambre</option>
        <option>Pour 1 personne</option>
        <option>Pour 2 personnes</option>
        <option>Pour 3 à 6 personnes</option>
    </select>
    <select class="selectpicker">
        <option selected disabled>Mois</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
    </select>
    <select class="selectpicker">
        <option selected disabled>Narive</option>
        <option>Zodiac</option>
        <option>Riva</option>
        <option>Bayliner</option>
        <option>Capelli</option>
        <option>Sea-Ray</option>
    </select>
    <select class="selectpicker">
        <option selected disabled>Port d'arrivée</option>
        <?php foreach ($data['ports'] as $port) : ?>
        <option value="<?php $port->id_p?>"><?php $port->nameP?></option>
        <?php endforeach ?>
    </select>
    <select class="selectpicker">
        <option selected disabled>Port départ</option>
         <?php foreach ($data['ports'] as $port) : ?>
        <option value="<?php $port->id_p?>"><?php $port->nameP?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="croisieres">
    <?php foreach ($data['cruises'] as $cruise) : ?>
        <div class="card" style="width: 13rem;">
            <img src="<?= URLROOT?>image/<?= $cruise->image ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 style="color: black;" class="card-title"><?= $cruise->port_dar ?></h5>
                <a href="<?= URLROOT?>cruise/show/<?= $cruise->id_cr ?>" class="btn btnMe">VIEW</a>
                <a href="<?= URLROOT?>cruise/reserve/<?= $cruise->id_cr ?>" class="btn btnMe">RESERVE</a>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>