function MostrarPreguntas(id){ 
    
    $("#licenciatura").hide();
    $("#maestria").hide();
    $("#doctorado").hide();

    if (id == "licenciatura") {
        $("#licenciatura").show();
        $("#maestria").hide();
    }

    if (id == "maestria") {
        $("#maestria").show();
        $("#licenciatura").hide();
        $("#doctorado").hide();
    }

    if (id == "doctorado") {
        $("#doctorado").show();
        $("#maestria").hide();
        $("#licenciatura").hide();
    }
  }