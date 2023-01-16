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
                    <img style="height: 196px !important;" class="img-fluid img-responsive rounded product-image" src="<?=URLROOT?>image/<?=$reservation->image?>">
                </div>
                <div class="col-md-6 mt-1">
                    <h5><?=$reservation->nameP_a?></h5>
                    <div class="mt-1 mb-1 spec-1">
                        <span class="dot"></span>
                        <span>Name navire : <?=$reservation->name_n?></span><br>
                        <span class="dot"></span>
                        <span>date : <?=$reservation->date_re?></span><br>
                        <span class="dot"></span>
                        <span>port départ : <?=$reservation->nameP_d?></span><br>
                        <span class="dot"></span>
                        <span>port d'arrivé : <?=$reservation->nameP_a?></span>
                        <?php if ($reservation->id_t_ch != 1 ):?>
                        <span class="dot"></span>
                        <span>numero de chambre : <?=$reservation->id_ch?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$<?=$reservation->prix_re?></h4>
                    </div>
                    <div class="d-flex flex-column mt-4">
                        <a href=" <?=URLROOT .'cruises/deleteReservation/'. $reservation->id_re?> "><button class="btn btn-primary btn-sm" type="button">Annuler</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>