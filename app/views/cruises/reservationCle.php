<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
    <?php foreach ($data['reservations'] as $reservation ) : ?>
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <img class="img-fluid img-responsive rounded product-image" src="<?=URLROOT?>image/"><?=$data['reservations']->image?>
                </div>
                <div class="col-md-6 mt-1">
                    <h5>Planet</h5>
                    <div class="mt-1 mb-1 spec-1">
                        <span class="dot"></span>
                        <span>Name croisere :</span><br>
                        <span class="dot"></span>
                        <span>date :</span><br>
                        <span class="dot"></span>
                        <span>port départ :</span><br>
                        <span class="dot"></span>
                        <span>port d'arrivé :</span>
                    </div>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$13.99</h4>
                    </div>
                    <div class="d-flex flex-column mt-4">
                        <a href=" #annuler.php "><button class="btn btn-primary btn-sm" type="button">Annuler</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>