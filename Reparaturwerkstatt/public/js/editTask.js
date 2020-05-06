
var comboBox = document.getElementById("processing");
if (processing == "0") {
    comboBox.value = "Reparaturauftrag abgeschlossen";
} else {
    comboBox.value = "Reparaturauftrag pendent";
}