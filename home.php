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
</header>

<form action="api/rest-api.php" method="POST" >
<div class="container">
<article>
	
<section id="bread-section">
		<h3>#1 Bread</h3>
		<ul id="bread">
			 <!--li's available product from db extacted (json format)    -->
		</ul>
</section>

<section id="souce-section" >
		<h3 >#2 Souce</h3>
		<ul id="souce">
			 <!--li's available product from db extacted (json format)    -->
		</ul>
</section>
<section id="swtype-section" >
		<h3>#3 Sandwich Type</h3>
		<ul id="swtype">
			 <!--li's available product from db extacted (json format)    -->
		</ul>
</section>
<section  id="cheese-section">
		
		<h3>#4 Cheese</h3>
		<ul id="cheese">
			 <!--li's available product from db extacted (json format)    -->
		</ul>
</section>

</article>

<aside>
<section id="veggies-section">
			<h3>#5 Veggies</h3>
			<ul  id="veggies">
			
			</ul>
 </section>
		 <section id="summary">
		 	<div id="userinfo">
				
				<label>Full Name</label>
				<input type="txt" name="fullname" id="fullname"placeholder="fullname" required>
				<label>Email:</label>
				<input type="email" name="email" id="email" placeholder="email"><br>				
				<label>Date:</label>
			 	<script type="text/javascript">
			 		
			 		let today = new Date().toISOString().slice(0, 10);
			 		document.write("<strong>"+today+"</strong>");

			 	</script>
			 	<input type="hidden" name="insertorder">
				<input type="hidden" id="date" name="date" value="now" >
				<script type="text/javascript">
					var inputdate = document.getElementById('date');
			 		inputdate.setAttribute("value",today);
				</script>
			</form>
			</div>

			<h3>Order's Summary</h3>
			<ul >
				<li  id="bread_pick"></li>
				<li  id="souce_pick"></li>
				<li  id="cheese_pick"></li>
				<li  id="swtype_pick"></li>
				<li  id="veggies_pick"></li>			
			</ul>

			
			<button class="btn_v" id="submitform-1" type="button" onclick="submit_form()">Submit</button>
		</section>

</aside>

</div>
<footer style="height: 100%">
	<img src="img/icon2.png" width="100px"> <img src="img/icon1.png" width="100px"><p>This exam is good for 36 hours, kindly sumbit your output to descentemail@companymail.net</p>
</footer>

<script type="text/javascript" src="./js/javascript.js"></script>
</body>
</html>