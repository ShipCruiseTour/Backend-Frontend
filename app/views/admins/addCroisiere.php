<?php
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarAdmin.inc.php';
$noFooter = '';
?>
<h1 class="text-center">Add New croisiere</h1>
<div class="container">
    <form class="form-horizontal form11" enctype="multipart/form-data" method="POST">
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">name de croisiere</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="text" name="name_cr" class="form-control" required="required"
                    placeholder="name de croisiere" />
            </div>
        </div>
        <!-- Start name navire Field -->
        <div class="form-group form-group-lg labelInput11">
            <label class="col-sm-2 control-label">name navire</label>
            <div class="col-sm-10 col-md-6 input11">
                <select name="navire">
                    <option disabled selected value="0">...</option>
                    <?php foreach ($data['navires'] as $navire): ?>
                    <option value="<?=$navire->id_n?>"><?=$navire->name_n?></option>
                    <?php endforeach?>
                </select>
            </div>
        </div>
        <!-- End name navire Field -->
        <!-- Start port_depaportsrt Field -->
        <div class="form-group form-group-lg labelInput11">
            <label class="col-sm-2 control-label">ports (le trager)</label>
            <input type="text" name="posSelected" id="pos" class="form-control" required="required"
                placeholder="trager" />
            <div class="col-sm-10 col-md-6 input11">
                <select id="mySelect" multiple>
                    <option disabled selected value="0">...</option>
                    <?php foreach ($data['ports'] as $port): ?>
                    <option value="<?=$port->id_p?>"><?=$port->nameP?></option>
                    <?php endforeach?>
                </select>
            </div>
        </div>
        <!-- End port_dariv Field -->
        <!-- Start port_depart Field -->
        <!-- <div class="form-group form-group-lg labelInput11">
            <label class="col-sm-2 control-label">port darrive</label>
            <div class="col-sm-10 col-md-6 input11">
                <select name="poDa">
                    <option disabled selected value="0">...</option>
                    <?php foreach ($data['ports'] as $port): ?>
                    <option value="<?=$port->id_p?>"><?=$port->nameP?></option>
                    <?php endforeach?>
                </select>
            </div>
        </div> -->
        <!-- End port_depart Field -->
        <!-- Start prix_croisiere Field -->
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">prix de croisiere</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="numero" name="prix" class="form-control" required="required"
                    placeholder="prix de croisiere" />
            </div>
        </div>
        <div class="form-group form-group- labelInput11">
            <label class="col-sm-2 control-label">nombre de nuits</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="numero" name="nb_nuit" class="form-control" required="required"
                    placeholder="nombre de nuits" />
            </div>
        </div>
        <!-- End Name Field -->
        <!-- Start dat depart Field -->
        <div class="form-group form-group-lg labelInput11">
            <label class="col-sm-2 control-label">date de depart</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="date" id="date_reservation" name="dateDe" class="form-control" required="required"
                    placeholder="date depear" />
            </div>
        </div>
        <!-- End dat depart Field -->
        <!-- Start Submit image -->
        <div class="form-group labelInput11">
            <label class="col-sm-2 control-label">Image</label>
            <div class="col-sm-10 col-md-6 input11">
                <input type="file" name="img" accept="image/*"
                    style="margin-bottom: 10px !important; width: 100%; background-color: #0000001a;padding: 10px;border-radius: 10px;box-shadow: 0 4px 4px black;">
            </div>
        </div>
        <!-- End Tags image -->
        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Add Croisiere" name="btn_insert" class="btn btn-primary btn-sm" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>
<script>
var select = document.getElementById("mySelect");
var pos = document.getElementById("pos");

var selectedOptions = [];

select.addEventListener("change", function(event) {
    var option = event.target.options[event.target.selectedIndex];
    var value = option.value;
    if (option.selected) {
        selectedOptions.push(value);
    }
    // R??organiser les options dans l'ordre des options s??lectionn??es
    var orderedOptions = [];
    for (var i = 0; i < selectedOptions.length; i++) {
        var option = select.querySelector('option[value="' + selectedOptions[i] + '"]');
        if (option) {
            orderedOptions.push(selectedOptions[i]);
        }
    }
    pos.value = orderedOptions
    console.log(orderedOptions);
});
</script>


<?php include_once APPROOT . '/views/inc/footer.inc.php'?>