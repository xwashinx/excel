<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css">
  <script type="text/Javascript" src="recursos/js/jquery-3.2.1.min.js"></script> 
  <script src="recursos/js/bootstrap.min.js"></script>
</head>

<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-nomenclador">NOMENCLADOR</button>


<div class="modal fade" id="modal-nomenclador" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header" align="center">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-left">
          <button class="btn btn-primary btn-sm" onclick="lanzar_accion('restaurar')" id="btn-return">
            <i class="fa fa-fw fa-mail-reply"></i>
             ATRAS
          </button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
          <h5 class="modal-title"><b>GESTION DE NOMENCLADORES</b></h5></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"> <x id="fecha_nom"><!-- js --></x></div>
      </div>

      <div class="modal-body">
        <br>
        <!-- menu-acciones -->
        <div class="container-fluid" id="menu-nomenclador">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button class="btn btn-success btn-sm" onclick="lanzar_accion('alta')">
            <i class="fa fa-fw fa-plus-square"></i>
            CARGAR
            </button>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
            <button class="btn btn-warning btn-sm" onclick="lanzar_accion('edita')">
            <i class="fa fa-fw fa-edit"></i>
            MODIFICAR
            </button>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-left">
            <button class="btn btn-danger btn-sm" onclick="lanzar_accion('baja')">
            <i class="fa fa-fw fa-trash"></i>
            ELIMINAR
            </button>
          </div>
        </div>
        <!-- formulario alta/modificacion -->
        <div class="container-fluid">
          <form id="form-nomenclador">
            
            <input type="hidden" name="action" id="action">
            <input type="hidden" name="id_nomenclador" id="id_nomenclador">
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 frm-am">
              <div class="form-group">
                <label for="rm">RM <b>(Resonancia Magnetica).</b></label>
                <input type="text" class="form-control" onkeypress="return solo_numero(event)" autofocus="" id="rm" name="rm">
              </div> 

              <div class="form-group">
                <label for="tc">TC <b>(Tomografia Computada).</b></label>
                <input type="text" class="form-control" onkeypress="return solo_numero(event)" id="tc" name="tc">
              </div> 
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 frm-am">
              <div class="form-group">
                <label for="mg">MG <b>(Mamografia)</b>.</label>
                <input type="text" class="form-control" onkeypress="return solo_numero(event)" id="mg" name="mg">
              </div> 

              <div class="form-group">
                <label for="rx">RX <b>(Rayos)</b>.</label>
                <input type="text" class="form-control" onkeypress="return solo_numero(event)" id="rx" name="rx">
              </div> 
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 frm-am">
              <div class="form-group">
                <label for="ac">AC <b>(Alta Complejidad)</b>.</label>
                <input type="text" class="form-control" onkeypress="return solo_numero(event)" id="ac" name="ac">
              </div> 

              <div class="form-group">
                <label for="ur">UR <b>(Urgencia)</b>.</label>
                <input type="text" class="form-control" onkeypress="return solo_numero(event)" id="ur" name="ur">
              </div>   
            </div>

            <!-- Baja -->
            <div class="container-fluid" id="contenido-baja">
              <h5 class="text-center" style="color: #F35E4C;">El ultimo nomenclador cargado contiene los siguientes valores.</h5>
              <br>
              <table width="100%">
                <tr>
                  <td>Resonancia Magnetica: $ <x id='rm-del'><!-- Js --></x></td>
                  <td>Tomografia Computada: $ <x id='tc-del'><!-- Js --></x></td>
                  <td>Mamografia: $ <x id='mg-del'><!-- Js --></x></td>
                </tr>
                <tr>
                  <td>Rayos: $ <x id='rx-del'><!-- Js --></x></td>
                  <td>Alta Complejidad: $ <x id='ac-del'><!-- Js --></x></td>
                  <td>Urgencia: $ <x id='ur-del'><!-- Js --></x></td>
                </tr>              
              </table>              
            </div>

          </form>
        </div>
        <br>
      </div>

      <div class="modal-footer">
        <div class="col-lg-6 col-md-6 col-sm-6 text-left">
           <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
           <button type="button" class="btn btn-success" id="btn-procesamiento" onclick="procesar_accion()">CONTINUAR</button>  
        </div>        
      </div>
    </div>

  </div>
</div>
   
  <script type="text/javascript">

    $(document).ready(function(){
      $("#action").val('');
      $("#form-nomenclador").hide();
      $("#form-nomenclador")[0].reset();
      $("#btn-return").hide();
      $("#fecha_nom").html("");
      $('#btn-procesamiento').hide();
      $("#contenido-baja").hide();
      $(".frm-am").show();
    });
    // OBTIENE UN ARRAY CON TODOS LOS DATOS DE UN FORM.
    function datosForm(idForm) {
        var datos = $(idForm).serializeArray(),
               res = {};

        $.each(datos, function(i, v) {
            res[v.name] = v.value;
        });

        return res;
    }     
    // ESTABLECE LOS ELEMENTOS NECESARIOS PARA CADA VISTA.
    function lanzar_accion(action){
      $("#contenido-baja").hide();
      $("#fecha_nom").html("");
      $("#btn-return").show();
      $("#form-nomenclador").show();
      $("#menu-nomenclador").hide();
      $('#btn-procesamiento').show();
      $(".frm-am").show();

      switch(action){
        case 'alta':
          $("#action").val('alta');
          $("#btn-procesamiento").text("GUARDAR");
          $('#btn-procesamiento').removeClass('btn-warning');          
          $('#btn-procesamiento').addClass('btn-success');
          break;
        
        case 'edita':
          $("#action").val('edita');
          cargar_db_nomenclador('edicion');
          $("#btn-procesamiento").text("MODIFICAR");
          $('#btn-procesamiento').removeClass('btn-warning');          
          $('#btn-procesamiento').addClass('btn-success');
          break;
        
        case 'baja':
          $("#action").val('baja');
          $("#btn-procesamiento").text("ELIMINAR");
          $('#btn-procesamiento').removeClass('btn-success');          
          $('#btn-procesamiento').addClass('btn-warning');
          $("#contenido-baja").show();
          $(".frm-am").hide();
          cargar_db_nomenclador('baja');
          break;                    
        
        case 'restaurar':
          $("#form-nomenclador")[0].reset();
          $("#form-nomenclador").hide();
          $("#menu-nomenclador").show();
          $("#btn-return").hide();
          $('#btn-procesamiento').hide();
          $("#fecha_nom").html("");
          break;
      }
    }
    // PROCESA Y ENVIA EL FORMULARIO.
    function procesar_accion(){
      var parametros = datosForm("#form-nomenclador");
      switch(parametros['action']){

        case 'alta':  msj_alert = 'Se procedera a cargar el nuevo nomenclador, Desea continuar?.'; break;
        case 'edita': msj_alert = 'Se procedera a guardar los cambios efectuados en el ultimo nomenclador, Desea continuar?.'; break;
        case 'baja':  msj_alert = 'Esta a punto de eliminar el ultimo nomenclador cargado, esto reactivara el anterior, Desea continuar?.'; break;
      
      }

      try{

        if (parametros['action'] == '') 
          throw "Se produjo un error mientras se procesaba la solicitud, Por favor recargue la pagina e intente nuevamente.";

          if (confirm(msj_alert)) {
            $.ajax({
                data:  parametros,
                type:  'post',
                url:   'procesar_nomenclador.php',
                success: function (response) {

                      var res = $.parseJSON(response);
                      alert(res.mensaje);
                      $("#form-nomenclador")[0].reset();
                      lanzar_accion('restaurar');
                
                }, error: function(msj){
                    alert(msj)
                }
            });                      
          }

      }catch(err){
        alert(err);
      }
    }
    // CARGA EN EL FORM LOS DATOS DE LA DB.
    function cargar_db_nomenclador(que_hacer){
      $.ajax({
          data:  { action: 'ultimo_nomenclador' },
          type:  'post',
          url:   'procesar_nomenclador.php',
          success: function (response) {
                  if (response != 'null') {
                    var res = $.parseJSON(response);
                    $("#id_nomenclador").val(res.id_nomenclador);
                    switch(que_hacer){  
                      case'edicion':
                        $("#rm").val(res.rm);
                        $("#tc").val(res.tc);
                        $("#mg").val(res.mg);
                        $("#rx").val(res.rx);
                        $("#ac").val(res.ac);
                        $("#ur").val(res.ur);
                        $("#fecha_nom").html("Creado: <b>"+res.fecha+"</b>");
                        break;

                      case'baja':
                        $('#mg-del').html("<b>"+res.mg+"</b>");
                        $('#rm-del').html("<b>"+res.rm+"</b>");
                        $('#tc-del').html("<b>"+res.tc+"</b>");
                        $('#rx-del').html("<b>"+res.rx+"</b>");
                        $('#ac-del').html("<b>"+res.ac+"</b>");
                        $('#ur-del').html("<b>"+res.ur+"</b>");
                        break;
                    }
                  }else{
                    alert("No se encontraron Resultados para mostrar!.");
                    lanzar_accion('restaurar');
                  }

          }, error: function(msj){
              alert(msj)
          }
      }); 
    }
    // LIMITA UN INPUT SOLO A NUMEROS , y . 
    function solo_numero(e){
        tecla = (document.all) ? e.keyCode : e.which;

        if ( tecla==0 || tecla==8 || tecla==44  || tecla==46 ) return true;
        patron = /^[0-9]+$/;
        te = String.fromCharCode(tecla);
        return patron.test(te);   
    }    

  </script> 

</body>
</html>