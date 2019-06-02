 <!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.3/css/mdb.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body background="vistas/img/rd.png">

    <style type="text/css">
  

.main-section
{
  margin:0 auto;
    margin-top:25%;
    padding: 0; 
}

.modal-content{
  background-color: #3b4652;
  opacity: .85;
  padding: 0 20px;
  box-shadow: 0px 0px 3px #848484;

}

.user-img{
  margin-top: -50px;
  margin-bottom: 35px;
}

.user-img img{
  width: 100px;
  height: 100px;
  box-shadow: 0px 0px 3px #848484;
  border-radius: 50%; 
}

.form-group input{
  height: 42px;
  font-size:  18px;
  border: 0;
  padding-left: 54px;
  border-radius: 5px; 
}


.form-group::before{
  font-family: "Font Awesome\ 5 Free"; 
  position: absolute;
  left: 28px;
  font-size: 22px;
  padding-top:4px;
}

.form-group#user2-group::before
{
     content: "\f06e";

}

.form-group#user-group::before
{
  content: "\f007";
}

.form-group#user1-group::before
{
  content: "\f0e0";
}

.form-group#user3-group::before
{
  content: "\f06e";
}

  button
  {
 
  width: 60%;
  margin: 5px 0 25px;

}


</style>

 
<div class="modal-dialog text-center">
<div class="col-sm-9 main-section">
          <div class="modal-content">

    <legend  style="font-size: 24pt"><b> <font  style="color: #FACD07;">!Registro de Usuario¡</i></font> </b>
   </legend>
  <form align="center" method="POST" action="">
  <fieldset>
    <div align="center">
     <label></label><a href="principal.php"><button style="font-size: 8pt;" type="button" class="btn btn-warning"><font style="color: #070707;">Iniciar Secion</font></button></a>
</div>
<br>
<br>

 <div class="form-group" id="user-group">
 <input name="realname" type="text" class="form-control" placeholder="Ingresa tu Nombre"></div>
<br>
   <div class="form-group" id="user1-group">
     <input name="nick" type="text" class="form-control" require placeholder="Ingresa tu e-mail"></div>
<br>   
<div class="form-group" id="user2-group">
  <input name="pass" type="password" class="form-control" placeholder="Ingresa tu Contraseña"></div>

    <br>
  <div class="form-group" id="user3-group">
  <input name="rpass" type="password" class="form-control" require placeholder="Repite tu Contraseña"> </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"> Registrarse </i></button>
  </fieldset>
</div>
</form>
</div>
</div>
</div>
<?php
		if(isset($_POST['submit']))
    {
			require("registro.php");
		}
	?>
<!--Fin formulario registro -->
		</td>
		</tr>
		</table>
		</div></center></div></center>
</body>
</html>