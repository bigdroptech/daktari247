<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<title>ERROR</title>

	<!-- Main CSS -->
    <link href="css/doc.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>
<body>

	<section id="error">
        <div class="container">
        		<div class="col-md-6 col-md-offset-3 error">
        			<div class="col-md-4 errorimg"> <img src="img/error.png" alt="ERROR"> </div>
        			<div class="col-md-8">
        				<h1>ERROR!!!</h1>
        				<h4>ooops! something Went wrong click <a href="index.php">here</a> to go back</h4>
        				</div>
        		</div>
        </div>
    </section>

	
</body>
</html>