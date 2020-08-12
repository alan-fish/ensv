function mostrarDiv(id){ 
    
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

  function mostrarForm(id){ 
    
    $("#agregarCiclo").hide();
    $("#agregarLicenciatura").hide();
    $("#agregarMateria").hide();
    $("#agregarGrupo").hide();

    if (id == "cic") {
        $("#agregarCiclo").show();
        $("#agregarLicenciatura").hide();
        $("#agregarMateria").hide();
        $("#agregarGrupo").hide();

    }

    if (id == "licen") {
        $("#agregarLicenciatura").show();
        $("#agregarCiclo").hide();
        $("#agregarMateria").hide();
        $("#agregarGrupo").hide();
   
    }

    if (id == "mate") {
        $("#agregarMateria").show();
        $("#agregarCiclo").hide();
        $("#agregarLicenciatura").hide();   
        $("#agregarGrupo").hide();
    }

    if (id == "grp") {
        $("#agregarGrupo").show();
        $("#agregarCiclo").hide();
        $("#agregarLicenciatura").hide();
        $("#agregarMateria").hide();
       
    }

  }

  function mostrarTable(id){ 
    
    $("#tablaCiclo").hide();
    $("#tablaLicenciatura").hide();


    if (id == "tbCiclo") {
        $("#tablaCiclo").show();
        $("#tablaLicenciatura").hide();
        $("#tablaMateria").hide();
        $("#tablaGrupo").hide();
    }

    if (id == "tbLicenciatura") {
        $("#tablaCiclo").hide();
        $("#tablaLicenciatura").show();
        $("#tablaMateria").hide();
        $("#tablaGrupo").hide();
   
    }

  }