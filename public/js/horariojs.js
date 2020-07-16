function dia() {
    var d = document.getElementById("dia");
    var displaytext = d.options[d.selectedIndex].text;
    document.getElementById("dias").value = displaytext;
}



function hora() {
    var d = document.getElementById("hora");
    var displaytext = d.options[d.selectedIndex].text;
    document.getElementById("horas").value = displaytext;
}




function grupo() {
    var d = document.getElementById("grupo");
    var displaytext = d.options[d.selectedIndex].text;
    document.getElementById("grupos").value = displaytext;
}



function docente() {
    var d = document.getElementById("docente");
    var displaytext = d.options[d.selectedIndex].text;
    document.getElementById("docentes").value = displaytext;
}



function materia() {
    var d = document.getElementById("materia");
    var displaytext = d.options[d.selectedIndex].text;
    document.getElementById("materias").value = displaytext;
}



function ciclo() {
    var d = document.getElementById("ciclo");
    var displaytext = d.options[d.selectedIndex].text;
    document.getElementById("ciclos").value = displaytext;
}