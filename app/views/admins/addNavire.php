<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Add New navire</h1>
<div class="container">
    <form class="form-horizontal form11" enctype="multipart/form-data" method="POST">
        <!-- Start name of navire Field -->
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">name of navire</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="text" name="nameN" class="form-control" required="required"
                    placeholder="name of navire" />
            </div>
        </div>
        <!-- End name of navire Field -->
        <!-- Start nombre de chambre Field -->
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">nombre de chambre</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="number" name="nb_ch" class="form-control" required="required"
                    placeholder="nombre de chambre" />
            </div>
        </div>
        <!-- End nombre de chambre Field -->
        <!-- Start nombre de personne Field -->
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">nombre de personne</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="number" name="nb_pl" class="form-control" required="required"
                    placeholder="nombre de personne" />
            </div>
        </div>
        <!-- End nombre de personne Field -->
        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" style="margin-top: 15px;" value="Add navire" name="btn_insert"
                    class="btn btn-primary btn-sm" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>


<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>