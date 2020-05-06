
var comboBox = document.getElementById("urgency");
var printBox = document.getElementById("returnDate");
var today = new Date().toISOString().slice(0, 10);

comboBox.addEventListener("change", function () {
    switch (comboBox.value) {
        case "sehr tief":
            printBox.value = "Voraussichtliches Rückgabedatum: " + addDays(today, 25);
            break;
        case "tief":
            printBox.value = "Voraussichtliches Rückgabedatum: " + addDays(today, 10);
            break;
        case "normal":
            printBox.value = "Voraussichtliches Rückgabedatum: " + addDays(today, 15);
            break;
        case "hoch":
            printBox.value = "Voraussichtliches Rückgabedatum: " + addDays(today, 10);
            break;
        case "sehr hoch":
            printBox.value = "Voraussichtliches Rückgabedatum: " + addDays(today, 5);
            break;
    }
});

function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result.toISOString().slice(0, 10);
}