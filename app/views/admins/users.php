<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Manage user</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>username</td>
                <td>Email</td>
            </tr>
            <?php foreach ($data['users'] as $user) : ?>
            <tr>
                <td><?=$user->id_u?></td>
                <td><?=$user->userName?></td>
                <td><?=$user->Email?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>