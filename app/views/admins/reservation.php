<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Manage reservation</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID Reservation</td>
                <td>Narive</td>
                <td>date Reservation</td>
                <td>prix Reservation</td>
                <td>Utilisateur</td>
            </tr>
            <?php foreach ($data['reservations'] as $reservation) : ?>
            <tr>
                <td><?=$reservation->id_re?></td>
                <td><?=$reservation->name_n?></td>
                <td><?=$reservation->date_re?></td>
                <td><?=$reservation->prix_re?>DH</td>
                <td><?=$reservation->userName?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>