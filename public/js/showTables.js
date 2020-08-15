function mostrarTable(id){ 
    
        $("#Lunes").hide();
        $("#Martes").hide();
        $("#Miercoles").hide();
        $("#Jueves").hide();
        $("#Viernes").hide();


    if (id == "tbLunes") {
        $("#Lunes").show();
        $("#Martes").hide();
        $("#Miercoles").hide();
        $("#Jueves").hide();
        $("#Viernes").hide();
    }

    if (id == "tbMartes") {
        $("#Lunes").hide();
        $("#Martes").show();
        $("#Miercoles").hide();
        $("#Jueves").hide();
        $("#Viernes").hide();
    }
    
    
    if (id == "tbMiercoles") {
        $("#Lunes").hide();
        $("#Martes").hide();
        $("#Miercoles").show();
        $("#Jueves").hide();
        $("#Viernes").hide();
    }
  }
  