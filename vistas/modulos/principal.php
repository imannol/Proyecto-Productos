<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.3/css/mdb.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="index.css">


<body background="vistas/img/imgmundo.jpg" style="background-attachment: fixed">
	
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

.form-group#password-group::before
{
     content: "\f06e";

}

.form-group#user-group::before
{
	content: "\f007";
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
          	<div class="col-12 user-img">
               <img src="vistas/img/avatar.png">
            </div>
            
            <form action="validar.php" method="post" class="col-12">
             
              <div class="form-group" id="user-group">
                 <input name="mail" type="text" class="form-control" placeholder="Nombre de Usuario">
              </div>

              <div class="form-group" id="password-group">
  	              <input type="password" name="pass" class="form-control"  placeholder="*******">
              </div>

    <button type="submit" class="btn btn-primary"> Ingresar </button>

    <div align="center">
    	<a href="vistas/modulos/registro_usuario.php"><label style="font-size: 8pt;"><font style="color: #FFFFFF;">¿No tienes una cuenta? Registrate</font></label> <label style="font-size: 8pt;"></a>
    	</div>
    </div>
    </form>
    </div>
    </div>
    </div>
    
</body>
</html>
<!-- formulario registro -->
