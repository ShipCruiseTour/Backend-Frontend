<select id="mySelect" multiple>
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
    <option value="option4">Option 4</option>
    <option value="option5">Option 5</option>
</select>
<input type="text" id="pos" name="posSelected">

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
    // Réorganiser les options dans l'ordre des options sélectionnées
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