function mostrarTable(id){ 

    
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
  