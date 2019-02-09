
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Pre-Order</title>
</head>
<body>
<header>
	<div class="container">
		<div id="branding">
			<h1><img src="./img/sandwich.jpg">Pre-Order Your <span class="hilight">SUB</span> by 8:30 am</h1>
			<p>Late orders are <span class="underline">not</span> accepted. <span class="underline">Orders not picked up will not be allowed to pre order again</span></p>
		</div>
		
	</div>
	<style type="text/css">
		
		#content{
			color:white;
			text-align: center;
		}
		a:hover{
			font-weight: bold;
		}
	</style>
</header>
<div class="container" id="content" >
	 
	 <h1><?php if(isset($_GET['success'])){ echo htmlspecialchars($_GET['success']).".<br>";}?></h1> 
	 <img src='img/whitehorse.gif'>
	 <p><a href="home.php" style="color:white;">Back to homepage</a>
	<br>
	

	
</div>
<footer style="height: 100%">
	<img src="img/icon2.png" width="100px"> <img src="img/icon1.png" width="100px"><p>This exam is good for 36 hours, kindly sumbit your output to descentemail@companymail.net</p>
</footer>


	 


</body>
</html>