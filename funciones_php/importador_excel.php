<?php
    require_once '../librerias_php/Excel/reader.php';
    include('../conexion.php');

    date_default_timezone_set("America/Argentina/Buenos_Aires");



    

    // SUBIENDO AL SV EL EXCEL
    
    if(isset($_POST['SubmitButton'])){
        
        // SUBIENDO EL EXCEL
        $up_filename=$_FILES["filepath"]["name"];
        $file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
        $file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
        $f2 = $new_id . $file_ext;

        move_uploaded_file($_FILES["filepath"]["tmp_name"],"../excel_importados/excel" . $f2);

        if($file_ext == ".xls")
        {
             
              $data = new Spreadsheet_Excel_Reader();
              $data->setOutputEncoding('CP1251');
              $data->read('../excel_importados/excel'.$f2);

              $respuesta = false;

               /*$sql =
              "INSERT INTO resumenes (id, tipo_de_examen, region, paciente, sexo, dob, compania_de_seguro, 
                medico_de_referencia, fecha, entrega, medico, id_paciente, institucion, nivel, modalidad,
                 creado, abierto, asignado, impreso, fecha_de_estudio, hora_de_estudio, recibido, faciliti_id, 
                 id_estudio, id_tipo_estudio) VALUES (NULL, 'radiogafia',,'region' 'mario olivera', 'MASCULINO',
                  '2018-02-07 03:14:22', 'prueba seguro', '1', '2018-02-15 06:30:43', '06:28:34', 'gasdasd', '11', 
                  'asdasd', 'NORMAL', 'asdasd', '2018-02-13 07:27:40', '2018-02-21 06:30:36', '2018-02-07 09:23:30',
                   '2018-02-15 06:32:39', '2018-02-13 07:21:39', '03:34:36', '2018-02-22 03:14:32', '1', '1', '1');";*/
             
              

              echo "<table>";
              
              for ($i = 10; $i <= $data->sheets[0]['numRows']; $i++) {
                  echo("<tr>");

                  $sql =
              "INSERT INTO resumenes (id, tipo_de_examen, region, paciente, sexo, dob, compania_de_seguro, 
                medico_de_referencia, fecha, entrega, medico, id_paciente, institucion, nivel, modalidad,
                 creado, abierto, asignado, impreso, fecha_de_estudio, hora_de_estudio, recibido, faciliti_id, 
                 id_estudio, id_tipo_estudio) VALUES (NULL, ";

                  for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

                    $valor_campo = $data->sheets[0]['cells'][$i][$j];

                    if($j == 1)
                    {
                      $valor_campo = explode("-",$data->sheets[0]['cells'][$i][$j]);
                      echo("<td>".trim($valor_campo[0])."</td>");

                      $sql .= "'".trim($valor_campo[0])."', '".trim($valor_campo[1])."' ";
                    }
                    else if ($j==4  || ($j >= 14 && $j <= 18))
                    {
                      $valor_row = $data->sheets[0]['cells'][$i][$j];
                      $valor_row = explode("/",$valor_row);

                      $dia = $valor_row[1];
                      $mes = $valor_row[0];
                      $anio_hora_formato = explode(" ",$valor_row[2]);
                      $anio = $anio_hora_formato[0];
                      $hora_formato = $anio_hora_formato[1]." ".$anio_hora_formato[2];
                      $hora_formato = date("H:i:s",strtotime($hora_formato));
                      
                      $dob = $anio."-".$mes."-".$dia." ".$hora_formato;
                      echo("<td>".trim($dob)."</td>");
                      $sql .= " , '".$dob."' ";
                    }
                    else if($j == 7)
                    {
                      $valor_row = $data->sheets[0]['cells'][$i][$j];
                      $valor_row = explode("/",$valor_row);

                      $dia = $valor_row[0];
                      $mes = $valor_row[1];
                      $anio_hora = explode(" ",$valor_row[2]);
                      $anio = $anio_hora[0];
                      $hora = $anio_hora[1];

                      $valor_row = $anio."-".$mes."-".$dia." ".$hora;
                      echo("<td>".trim($valor_row)."</td>");
                      $sql .= " , '".$valor_row."' ";
                    }
                    else if($j == 20)
                    {
                      $valor_row = $data->sheets[0]['cells'][$i][$j];
                      $valor_row = explode("/",$valor_row);

                      $dia = $valor_row[1]; hgcgh
                      $mes = $valor_row[0];
                      $anio_hora = explode(" ",$valor_row[2]);
                      $anio = $anio_hora[0];
                      $hora = $anio_hora[1];

                      $valor_row = $anio."-".$mes."-".$dia." ".$hora;
                      echo("<td>".trim($valor_row)."</td>");
                      $sql .= " , '".$valor_row."' ";
                    }
                    else
                    {
                       echo "<td>".$valor_campo ."</td>";
                      $sql .= " , '".$valor_campo."' ";
                    }
                         
                  }

                  $sql.=")";
                echo  $sql;

                mysql_query($sql,conectint());
                echo("</tr>");

              }
              
              echo "</table>";
        }
        else
        {
            echo "ERROR NO ES EXCEL PAPIN";
        }
    } 

    
?>