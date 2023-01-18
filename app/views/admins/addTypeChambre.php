<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Add New Type Chambre</h1>
<div class="container">
    <form class="form-horizontal form11" enctype="multipart/form-data" method="POST">
        <!-- Start name Port Field -->
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">Name OF Type Chambre</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="text" name="Name" class="form-control" required="required"
                    placeholder="Name OF Type Chambre" />
            </div>
        </div>
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">Prix OF Type Chambre</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="bumero" name="Prix" class="form-control" required="required"
                    placeholder="Prix OF Type Chambre" />
            </div>
        </div>
        <!-- End name Port Field -->
        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" style="margin-top: 15px;" value="Add Port" name="btn_insert" class="btn btn-primary btn-sm" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>