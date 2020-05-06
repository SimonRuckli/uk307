
var comboBox = document.getElementById("urgency");
var printBox = document.getElementById("urgencydays");

comboBox.addEventListener("change", function () {
    switch (comboBox.value) {
        case "sehr tief":
            printBox.value = "Voraussichtliche Dauer: 25 Tage";
            break;
        case "tief":
            printBox.value = "Voraussichtliche Dauer: 20 Tage";
            break;
        case "normal":
            printBox.value = "Voraussichtliche Dauer: 15 Tage";
            break;
        case "hoch":
            printBox.value = "Voraussichtliche Dauer: 10 Tage";
            break;
        case "sehr hoch":
            printBox.value = "Voraussichtliche Dauer: 5 Tage";
            break;
    }
});

alert("Werkzeug: " + tools[3]);