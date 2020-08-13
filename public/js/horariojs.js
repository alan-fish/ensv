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
    var displayvalue = d.options[d.selectedIndex].value;
    document.getElementById("grupos").value = displaytext;
    document.getElementById("grupos_valor").value = displayvalue;
}

function docente() {
    var d = document.getElementById("docente");
    var displaytext = d.options[d.selectedIndex].text;
    var displayvalue = d.options[d.selectedIndex].value;
    document.getElementById("docentes").value = displaytext;
    document.getElementById("docentes_valor").value = displayvalue;
}

function materia() {
    var d = document.getElementById("materia");
    var displaytext = d.options[d.selectedIndex].text;
    var displayvalue = d.options[d.selectedIndex].value;
    document.getElementById("materias").value = displaytext;
    document.getElementById("materias_valor").value = displayvalue;
}


function ciclo() {
    var d = document.getElementById("ciclo");
    var displaytext = d.options[d.selectedIndex].text;
    var displayvalue = d.options[d.selectedIndex].value;
    document.getElementById("ciclos").value = displaytext;
    document.getElementById("ciclos_valor").value = displayvalue;
}

$(document).ready(function(){
function licenciatura(){
        var d = document.getElementById("licenciatura");
        var displaytext = d.options[d.selectedIndex].text;
        var displayvalue = d.options[d.selectedIndex].value;
        document.getElementById("lic").value = displaytext;
        document.getElementById("lic_valor").value = displayvalue;

        $('#semestre').change(function(){
        var licenciaturas_id = $('#licenciatura').val();
        var semestre = $('#semestre').val();
        var array = [licenciaturas_id, semestre ];
        console.log(array);
        if ($.trim(licenciaturas_id) != '') { 
            $.get('/admin/materias/'+licenciaturas_id+'/'+semestre, function(materias){
                $('#materia').empty();
                var materia_select = '<option value="">Seleccione una materia</option>'
                    for (var i=0; i<materias.length;i++)
                    materia_select+='<option value="'+materias[i].id+'">'+materias[i].materia+'</option>';
                    $("#materia").html(materia_select);
            });
        }
        
        });
}
licenciatura();
$('#semestre').change(licenciatura);
});

//click="licenciatura();" onchange="ciclo();"