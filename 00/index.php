<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#img_div{

			position:relative;

		}
		#num{
			font-size: 30px;
			color: #f43636;
			position:absolute;
			top:10px;
			left:10px;
			display: block;


		}
	</style>
</head>
<body>
<?php 
 ini_set('date.timezone','Asia/Shanghai');
 ?>
<div id="img_div">
 <img src='img.php' id="img">
 	<div id="num"><?php echo date('s',time()) ?></div>
</div>
<script src="https://cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">

function getDate(){
	var myDate = new Date();
	$('#num').html(myDate.getSeconds())

}		

window.setInterval("getDate()",1000);
   

</script>
</body>
</html>