$(document).ready(function(){
    function cuestionario2(){
        $.get('/alumno/preguntas2', function(preguntas2){  
            var respuetas_seletc = ''; 
            var pregunta_label ='';
            var j = 1;
            for (var i=0; i<preguntas2.length; i++) {
                pregunta_label+='<label for="preguntas" class="form-group col-sm-10"  >'+preguntas2[i].pregunta+'</label>';
                respuetas_seletc+='<select id="selectResult" for="respuestas" name="'+i+'"'+ 'class=" form-group  custom-select" >'+          
                                        '<option value="">'+'Respuesta '+j+'</option>'+
                                        '<option value="5">5</option>'+
                                        '<option value="4">4</option>'+
                                        '<option value="3">3</option>'+
                                        '<option value="2">2</option>'+
                                        '<option value="1">1</option>'+
                                    '</select>'; 
                $("#labels").html(pregunta_label);
                $("#selects").html(respuetas_seletc);
                j++;
            }

            });
    }
    cuestionario2();
});