function mostrarTR(id){ 

    $("#licenciatura").hide();
    $("#licenciatura1").hide();
    $("#licenciatura2").hide();
    $("#maestria").hide();
    $("#maestria1").hide();
    $("#maestria2").hide();
    $("#doctorado").hide();
    $("#doctorado1").hide();
    $("#doctorado2").hide();
    
    if (id == "licenciatura") {
        $("#licenciatura").show();
        $("#licenciatura1").show();
        $("#licenciatura2").show();
        $("#maestria").hide();
        $("#maestria1").hide();
        $("#maestria2").hide();
        $("#doctorado").hide();
        $("#doctorado1").hide();
        $("#doctorado2").hide();
    }

    if (id == "maestria") {
        $("#licenciatura").hide();
        $("#licenciatura1").hide();
        $("#licenciatura2").hide();
        $("#maestria").show();
        $("#maestria1").show();
        $("#maestria2").show();
        $("#doctorado").hide();
        $("#doctorado1").hide();
        $("#doctorado2").hide();
    }

    if (id == "doctorado") {
        $("#licenciatura").hide();
        $("#licenciatura1").hide();
        $("#licenciatura2").hide();
        $("#maestria").hide();
        $("#maestria1").hide();
        $("#maestria2").hide();
        $("#doctorado").show();
        $("#doctorado1").show();
        $("#doctorado2").show();
    }
  }