 <?php
include('sign/login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: perawat-sign/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Balai Pengobatan Universitas Andalas</title>
	<!-- icon poliklinik -->
	<link rel="icon" href="images/icon.png" type="image/x-icon"/>
	<!-- end./ icon poliklinik -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/timeline.css" rel="stylesheet">
    <link href="css/newGo.css" rel="stylesheet">
</head>
<style type="text/css">
#rorouni { border-radius:30px;}
</style>
<body>

    <div class="container" style="background-color:transparent">
        <div class="row" style="border-radius:50px;">
            <div class="col-md-6 col-md-offset-3" id="rorouni" style="border-radius:50px;">
                <div class="login-panel panel panel-default" style="border-radius:50px;">
                    <div class="panel-heading" style="border-radius: 52px 52px 0px 0px; background-color:#090; color:#FFF;">
                        <h3 class="panel-title" align="center">Balai Pengobatan Universitas Andalas</h3>
                    </div>
                    <div data-role="page" class="panel-body" id="anu" style="border-radius:25px;">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group col-md-6">
                                    <input style="border-radius:25px;" class="form-control" placeholder="Nama" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <input style="border-radius:25px;" class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox" align="center">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Ingat Password
                                    </label>
                                </div>
                                <input name="supmie" style="border-radius:25px;" class="btn btn-lg btn-success btn-block" type="submit" value=" Masuk " /><!--<a href="perawat-sign/" style="border-radius:25px;" class="btn btn-lg btn-success btn-block">Masuk</a>-->
								<span align="center" style="color:red;"><?php echo $error; ?></span>
							</fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script language="javascript">
    	
    </script>

</body>

</html>