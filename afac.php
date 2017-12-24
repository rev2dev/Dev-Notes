<?php
	if(isset($_POST["url"])){
		$url = $_POST["url"];
	}else{
		$url = "";
	}
		
?>
<html>
<head>
	<style>
		iframe{
			resize : both;
			overflow : auto;
		}
		div{
			resize : both;
			border : 1px solid red;
			overflow : auto;
		}
	</style>
</head>
<body>
	<form  method="post">
		<input type="text" name="url">
	</form>
	<div>
		<iframe src="<?php echo $url ?>"></iframe>
	</div>
	<iframe src="http://www.google.com"></iframe>
	<iframe width="100%" height="300px" src="demo_iframe.htm" name="iframe_a"></iframe>
<p><a href="http://www.w3schools.com" target="iframe_a">W3Schools.com</a></p>

</body>
</html>