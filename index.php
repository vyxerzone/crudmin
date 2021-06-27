<?php
ob_start();
session_start();
include("admin/config.php");
$error_message='';

if(isset($_POST['form1'])) {
        
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error_message = 'Email and/or Password can not be empty<br>';
    } else {
		
		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);

    	$statement = $pdo->prepare("SELECT * FROM usuarios WHERE email=? AND status=?");
    	$statement->execute(array($email,'Active'));
    	$total = $statement->rowCount();    
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
        if($total==0) {
            $error_message .= 'Email Address does not match<br>';
        } else {       
            foreach($result as $row) { 
                $row_password = $row['password'];
            }
        
            if( $row_password != md5($password) ) {
                $error_message .= 'Password does not match<br>';
            } else {       
            
				$_SESSION['user'] = $row;
                header("location: admin/index.php");
            }
        }
    }

    
}
?>
<?php include "admin/datosdemo.php"; ?>

<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo "$TituloSitio"; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="font/flaticon.css">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	<section class="fxt-template-animation fxt-template-layout25">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-12 fxt-bg-gradient">
					<div class="fxt-header">
						<div class="fxt-top-content">
						<!--	<div class="fxt-transformY-50 fxt-transition-delay-1">
								<a href="login-25.html" class="fxt-logo"><img src="img/logo-25.png" alt="Logo"></a>
							</div> -->
							<div class="fxt-transformY-50 fxt-transition-delay-2">
								<h1>Inter<strong>ZONE</strong></h1>
							</div>
							<div class="fxt-transformY-50 fxt-transition-delay-3">
								<p></p>
							</div>
						</div>
						<div class="fxt-bottom-content">
							<div class="fxt-transformY-50 fxt-transition-delay-4">
								<h2>INGRESA USANDO</h2>
							</div>
							<ul class="fxt-socials">
								<li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-6">
									<a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
								</li>
								<li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-7">
									<a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
								</li>
								<li class="fxt-google fxt-transformY-50 fxt-transition-delay-8">
									<a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
								</li>
								<li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-9">
									<a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
								</li>
								<li class="fxt-pinterest fxt-transformY-50 fxt-transition-delay-10">
									<a href="#" title="pinterest"><i class="fab fa-pinterest-p"></i></a>
								</li>
							</ul>
						<!--	<div class="fxt-transformY-50 fxt-transition-delay-11">
								<p>Don't have an account?<a href="register-25.html" class="switcher-text inline-text">Register</a></p>
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12 fxt-bg-color">
                	<div class="login-box-body">
					<div class="fxt-content">
						<div class="fxt-form">
							<div class="fxt-transformY-50 fxt-transition-delay-12">
								<h2>INGRESA TUS CREDENCIALES DE ACCESO</h2>
							</div>

                        <?php  if( (isset($error_message)) && ($error_message!='') ):
	                    echo '<div class="error">'.$error_message.'</div>';
	                    endif; ?>
              <!--  <form action="" method="post">
			    <div class="form-group has-feedback">
				    <input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" required="required" autofocus>
			        </div>
			    <div class="form-group has-feedback">
				    <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" required="required" value="">
			        </div>
		    	<div class="row">
				<div class="col-xs-8"></div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-primary btn-block btn-flat login-button" name="form1" value="LogIn">
	        			</div>
	        		</div>
	        	</form> -->

							<form action="" method="post">
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-14">
										<input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-15">
										<input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
										<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-17">
										<button type="submit" class="fxt-btn-fill" name="form1" >Log in</button>
									</div>
								</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="js/jquery-3.5.0.min.js"></script>
	<!-- Popper js -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- Validator js -->
	<script src="js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="js/main.js"></script>

</body>

</html>