<?php
    require_once '../librerias_php/Excel/reader.php';
    include('../conexion.php');

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

                echo "<table>";
                
                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                    echo("<tr>");
                    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                            echo("<td>".$data->sheets[0]['cells'][$i][$j] ."</td>");
                    }
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