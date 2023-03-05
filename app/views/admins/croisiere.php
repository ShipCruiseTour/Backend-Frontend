<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Manage Croisiere</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>name</td>
                <td>port_dep</td>
                <td>trager</td>
                <td>port_dar</td>
                <td>nombre de nuit</td>
                <td>prix_cr</td>
                <td>date_dep</td>
                <td>navire</td>
                <td>Delete</td>
            </tr>
            <?php foreach ($data['croisieres'] as $cruise) :?>
            <tr>
                <td><?=$cruise->id_cr?></td>
                <td><?=$cruise->name_cr?></td>
                <td><?=$cruise->nameP_d?></td>
                <td><?=$cruise->trager?></td>
                <td><?=$cruise->nameP_a?></td>
                <td><?=$cruise->nb_nuit?> nuits</td>
                <td><?=$cruise->prix_cr?>dh</td>
                <td><?=$cruise->date_dep?></td>
                <td><?=$cruise->name_n?></td>
                <td>
                    <a href="<?=URLROOT?>admins/croisiereDelete/<?=$cruise->id_cr?>" class='btn btn-danger confirm'><i
                            class='fa fa-close'></i> Delete </a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <a href="<?=URLROOT?>admins/croisiereAdd" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i> New Croisiere
    </a>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>