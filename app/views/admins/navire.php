<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Manage navire</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>name</td>
                <td>nombre chambre</td>
                <td>nombre personne</td>
                <td>Delete</td>
            </tr>
            <?php foreach ($data['narives'] as $narive) : ?>
            <tr>
                <td><?=$narive->id_n?></td>
                <td><?=$narive->name_n?></td>
                <td><?=$narive->nb_ch?></td>
                <td><?=$narive->nb_pl?></td>
                <td>
                    <a href="<?=URLROOT?>admins/navireDelete/<?=$narive->id_n?>" class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>
                </td>
            </tr>           
            <?php endforeach ?>
        </table>
    </div>
    <a href="<?=URLROOT?>admins/navireAdd" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i> New navire
    </a>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>