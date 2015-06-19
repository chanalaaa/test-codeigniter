<html ng-app="app">

<head>
	
	<script src="<? echo site_url("js/angular.min.js"); ?>"></script>
	<script src="<? echo site_url("js/appctrl.js"); ?>"></script>

</head>
<body ng-controller="appctrl">

<?php echo header('Content-type: text/html; charset=utf-8'); ?>



<form action="<?php echo "login" ?>" method="POST" >Username:<br>
<input type="text" name="user" value=""><br>Password:<br>
<input type="text" name="pass" value=""><br><br>
<input type="submit" value="Submit">
</form> 


</form>
</body>
</html>