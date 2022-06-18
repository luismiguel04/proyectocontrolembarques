<?php
        include 'menu2.php';
        //$menu = new BarraMenu();
        $menu = new menu();
        $menu ->barraMenu();


      

     ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clientes</title>
<link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
        <!--jquery-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!--bootstrap-js-->
        <script src="js/bootstrap.min.js"></script>
        <!--Datatables-->
       <!-- <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/> Editado y menu -->
        <script type="text/javascript" src="js/jquery.dataTables.js"></script><!-- Editado -->
        <!--Datatables responsive-->
        <link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css"/>
        <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>
        <!--Datatables Buttons
        <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.css"/> Editado y menu -->
        <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="js/buttons.html5.min.js"></script>





</head>
<body >

    <br>
     <div class="contenedor text-right" >
          <a href="clienteregistro.php" > 
           <input id="registrar" class="btn btn-success" btn-lg" type="button" value="Registrar"/></a>
          
            
             </div>

                
  <div class="container-fluid">
            <div class="page-header"style="background-color:lightskyblue;" >
                <h3 style="text-align: center "><p>Listado de Clientes</p></h3>
               
          </div>
             <!--tabla de consulta-->
            <div id="respuestaFiltro">
                <table  class="table" cellspacing="0" width="100%">
                    <thead>

                        <tr >
                            <th>Codigo</th>
                            <th>RFC</th>
                            <th>Nombre</th> 
                            <th>Dirreccion</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Contacto</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        
                                                       

                        </tr>
                    </thead>
  
  <?php

  try {
$pdo= new mysqli('localhost','usuario','123','aroundtheworld',3306);
$pdo->set_charset("utf8");


} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}

$query=('select * from cliente');

$resultado = mysqli_query($pdo,$query);
while ($mostrar=mysqli_fetch_array($resultado)){


            ?>





            <tr>
               <td><?php echo $mostrar['codcliente'] ?></td> 
               <td><?php echo $mostrar['rfc']?></td>
               <td><?php echo $mostrar['nombre']?></td>        
               <td><?php echo $mostrar['direccion']?></td>
               <td><?php echo $mostrar['correo']?></td>
               <td><?php echo $mostrar['tel']?></td>
               <td><?php echo $mostrar['contacto1']?></td>

                <form  id="modifica" class="form-horizontal" role="form" action="clientemodificar.php" method="post" >
                   
              
               <td><button name="codigo" value="<?php echo $mostrar['codcliente'] ?>" >Modificar </button></td>
             </form>
             <form  id="eliminar" class="form-horizontal" role="form"action="clienteeliminar.php"  method="post" >
                   
              
               <td><button name="codigo"  value="<?php echo $mostrar['codcliente'] ?>" >Eliminar </button></td>
             </form>
            
            

            </tr>
            <?php
               }
             ?>
                    <tbody> 
                    </tbody>
                </table>
            </div>
             <!--tabla de consulta-->

            <!-- <a href="index.php" class="btn btn-default">Salir</a> -->
        </div>




</body>
</html>

