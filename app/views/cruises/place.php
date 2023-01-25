<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>
<form action="<?php echo URLROOT; ?>cruises/trie" method="post">
    <div class="selects">
        <input type="date" name="date" placeholder="Date">
        <select class="selectpicker" name="Navire">
            <option selected disabled value="0">Narive</option>
            <?php foreach ($data['navires'] as $navire): ?>
                <option value="<?= $navire->id_n ?>"><?= $navire->name_n ?></option>
            <?php endforeach ?>
        </select>
        <select class="selectpicker" name="PortArr">
            <option selected disabled value="0">Port d'arrivée</option>
            <?php foreach ($data['ports'] as $port): ?>
                <option value="<?= $port->id_p ?>"><?= $port->nameP ?></option>
            <?php endforeach ?>
        </select>
        <select class="selectpicker" name="PortDep">
            <option selected disabled value="0">Port départ</option>
            <?php foreach ($data['ports'] as $port): ?>
                <option value="<?= $port->id_p ?>"><?= $port->nameP ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Chercher">
    </div>
</form>
<div class="croisieres">
    <?php foreach ($data['cruises'] as $cruise): ?>
        <div class="card" style="width: 13rem;">
            <img src="<?= URLROOT ?>image/<?= $cruise->image ?>" class="card-img-top" alt="croisiere">
            <div class="card-body">
                <h5 style="color: black;" class="card-title">
                    <?= $cruise->name_cr ?>
                </h5>
                <div class="d-flex justify-content-center">
                    <a href="<?= URLROOT ?>cruise/show/<?= $cruise->id_cr ?>" class="btn btnMe">VIEW</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>