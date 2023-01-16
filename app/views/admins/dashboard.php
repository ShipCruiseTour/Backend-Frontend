<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>

<div class="home-stats">
    <div class="container text-center">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="stat st-members">
                    <i class="fa fa-users"></i>
                    <div class="info">
                        Total Members
                        <span class="noBackground">
                            <a href="<?=URLROOT?>admins/users"><?=$data['usersMember']?></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat st-pending">
                    <i class="fa fa-ticket"></i>
                    <div class="info">
                        Total Reservations
                        <span class="noBackground">
                            <a href="<?=URLROOT?>admins/reservation"><?=$data['reservationMember']?></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat st-items">
                    <i class="fa fa-tag"></i>
                    <div class="info">
                        Total Croisiere
                        <span class="noBackground">
                            <a href="<?=URLROOT?>admins/croisiere"><?=$data['cruiseMember']?></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat st-comments">
                    <i class="fa fa-ship"></i>
                    <div class="info">
                        Total Navire
                        <span class="noBackground">
                            <a href="<?=URLROOT?>admins/navire"><?=$data['navireMember']?></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>