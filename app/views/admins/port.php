<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Manage Port</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>name</td>
                <td>Delete</td>
            </tr>
            <?php foreach ($data['ports'] as $port) :?>
            <tr>
                <td><?=$port->id_p?></td>
                <td><?=$port->nameP?></td>
                <td>
                    <a href="<?=URLROOT?>admins/portDelete/<?=$port->id_p?>" class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
    <a href="<?=URLROOT?>admins/portAdd" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i> New port
    </a>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>