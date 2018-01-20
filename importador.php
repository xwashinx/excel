
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IMPORTADOR EXCEL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- ADMINLTE CSS -->
  <link rel="stylesheet" href="recursos/css/AdminLTE.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="recursos/font-awesome/css/font-awesome.min.css">
 
  <style>
      html,body{
          padding:0;
          margin: 0;
          background-color: #ecf0f5;
      }
  </style>
</head>
<body>
    <?php include("menu_principal.php")?>
    
    <div class="col-md-12">
        <h3 class="text-center">EJEMPLO IMPORTADOR EXCEL</h3>
    </div>
    
    <div class="col-md-12">
        <h2 class="text-center">IMPORTAR</h2>
        <form action="funciones_php/importador_excel.php" method="post" enctype="multipart/form-data"> 
            <input class="btn btn-primary" type="file"  name="filepath" id="filepath"/>
            <br/>
            <input class="btn btn-primary" type="submit" name="SubmitButton" value="IMPORTAR EXCEL"/>
        </form>
    </div>
    
    <!-- jQuery 3 -->
    <script src="recursos/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="recursos/js/bootstrap.min.js"></script>
    
    <!-- ChartJS -->
    <script src="recursos/chart.js/Chart.js"></script>
    
</body>
</html>


