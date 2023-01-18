<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Manage Type Chambre</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>Name</td>
                <td>Prix</td>
                <td>Delete</td>
            </tr>
            <?php foreach ($data['typeChambres'] as $typeRomm) :?>
            <tr>
                <td><?=$typeRomm->id_t_ch?></td>
                <td><?=$typeRomm->Name?></td>
                <td><?=$typeRomm->Prix?> DH</td>
                <td>
                    <a href="<?=URLROOT?>admins/typeChambreDelete/<?=$typeRomm->id_t_ch?>" class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <a href="<?=URLROOT?>admins/typeChambreAdd" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i> New Type Chambre
    </a>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>