
function myAjaxRequestExtract(url,param_cat){

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
 		
 			if(xhttp.readyState==4 && xhttp.status==200){

 				var jObject = JSON.parse(xhttp.responseText);
 					
 				for(var i = 0; i<=jObject.length-1;i++){
 				
 				var li = document.createElement("LI");
 				var input = document.createElement("INPUT");

 				input.setAttribute("type","radio"); 	
 				input.setAttribute("name",param_cat);
 				input.setAttribute("value",jObject[i].p_name);
 				input.setAttribute("required","true");
 				input.setAttribute("id",param_cat+"-item");
 				input.setAttribute("onclick","add_to_summary('"+jObject[i].p_name+"','"+param_cat+"')");

 				if(jObject[i].details != null){
 					var textNode =  document.createTextNode(jObject[i].p_name+"("+jObject[i].details+")"); 					
 				}
 				else{					
 					var textNode = document.createTextNode(jObject[i].p_name);
 				}
 				li.appendChild(input);
 				li.appendChild(textNode);
 				document.getElementById(param_cat).appendChild(li);
 				}
 				

 			}
	}

	xhttp.open("GET",url+"?extract=true&category="+param_cat,true);
	xhttp.send();

}


function post_extract(param){
	var url = "api/rest-api.php";	
	var param_cat = param;
	myAjaxRequestExtract(url,param_cat);
}
post_extract('bread');
post_extract('souce');
post_extract('swtype');
post_extract('cheese');
post_extract('veggies');



function add_to_summary(value,category){
var inputVal=value;
var InputCat=category;

if(InputCat == "bread"){
    document.getElementById("bread_pick").innerHTML=inputVal	;
}else if(InputCat == "souce"){
	document.getElementById("souce_pick").innerHTML=inputVal	;
}else if(InputCat == "cheese"){

	document.getElementById("cheese_pick").innerHTML=inputVal	;
}else if(InputCat == "swtype"){
	document.getElementById("swtype_pick").innerHTML=inputVal	;
}else if(InputCat == "veggies"){
	document.getElementById("veggies_pick").innerHTML=inputVal	;
}


}


//form submitter
var errors =[];
function submit_form(){
	
	//validating radio buttons
	 
	 if(isOneChecked('bread')==false){
	 	remove_redborder();

	 	 errors.push("Bread category is required!");
	 	 var redone = document.getElementById('bread-section');
	 	 redone.style.border = "thin solid red";
	 	 redone.style.margin = "1px 1px 1px 10px";
	 	 	
	 	 	alert(document.getElementById("bread-section").style.border);
	 	 	
	 	 
	 }else if(isOneChecked('souce')==false){
	 	remove_redborder();


	 	  errors.push("Souce category is required!");
	 	  var redone = document.getElementById('souce-section');
	 	 redone.style.border = "thin solid red";
	 	 redone.style.margin = "1px 1px 1px 10px";
	 	 	
	 	 
	 }else if(isOneChecked('swtype')==false){
	 		remove_redborder();

	 		 errors.push("Sandwich type category is required!");
	 		 var redone = document.getElementById('swtype-section');
	 	 	redone.style.border = "thin solid red";
	 	 redone.style.margin = "1px 1px 1px 10px";
	 	 	

	 }else if(isOneChecked('cheese')==false){
	 	remove_redborder();

	 	 errors.push("Cheese category is required!");
	 	 var redone = document.getElementById('cheese-section');
	 	 redone.style.border = "thin solid red";
	 	 redone.style.margin = "1px 1px 1px 10px";
	 	
	 	 	
	 }else if(isOneChecked('veggies')==false){
	 		remove_redborder();

	 		 errors.push("Veggies type category is required!");
	 		 var redone = document.getElementById('veggies-section');
	 	 	redone.style.border = "thin solid red";
	 	
	 	 	

	 }else if(document.getElementById('fullname').value==""){
	 		remove_redborder();
	 		


	 		errors.push("Full name input can't be empty!");
	 		var redone = document.getElementById('fullname');
	 	 	redone.style.border = "thin solid red";
	 	 
	 	 
	 	 
	 }else if(document.getElementById('email').value==""){
	 		remove_redborder();


	 		var redone = document.getElementById('email');
	 	 	redone.style.border = "thin solid red";
	 	
	 	 	

	 		errors.push("email input cant be empty!");

	 }
	 if(errors.length>0){
	 		errors=[];
	 }else{
	 	remove_redborder();
	 	document.getElementById('submitform-1').style.backgroundColor="#636363";
	 	document.getElementById('submitform-1').disabled = true;
	 	var result = send_form_with_ajax();
	 	//ends here
	 }

}
function send_form_with_ajax(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState==4 && xhttp.status==200){
			jsonObj = JSON.parse(xhttp.responseText);
			if(jsonObj[0] == "success"){
				 	window.location.replace("success.php?success="+jsonObj[1]);
			}else{
				 alert(jsonObj[1]);
			}
		}


	}
	
	var name =  document.getElementById('fullname').value;
	var email = document.getElementById('email').value;
	var bread = document.querySelector('input[name="bread"]:checked').value; //works IE9 and all browsers :)
	var date = today;
	var souce = document.querySelector('input[name="souce"]:checked').value; 
	var swtype = document.querySelector('input[name="swtype"]:checked').value; 
	var cheese = document.querySelector('input[name="cheese"]:checked').value; 
	var veggies = document.querySelector('input[name="veggies"]:checked').value; 
	params = "insertorder=true&fullname="+name+"&email="+email+"&date="+date+"&bread="+bread+"&souce="+souce+"&swtype="+swtype+"&cheese="+cheese+"&veggies="+veggies;

	xhttp.open('POST',"api/rest-api.php",true)
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);

}
function remove_redborder(){
	var redone = document.getElementById('bread-section');
	redone.style.border = "0";	
	var redone = document.getElementById('souce-section');
	 		 redone.style.border = "0";
	 		
	var redone = document.getElementById('swtype-section');
	 	 redone.style.border = "0";	
	
	var redone = document.getElementById('cheese-section');
	 		 redone.style.border = "0";

	 var redone = document.getElementById('veggies-section');
	 	 	redone.style.border = "0";	
	 	 
	 var redone = document.getElementById('fullname');
	 	 	redone.style.border = "2px solid #dddddd";

	 var redone = document.getElementById('email');
	 	 	redone.style.border = "2px solid #dddddd";
	 		
}

//Thanks to Stack overflow
function isOneChecked(radioname) {
  // All <input> tags...
  var chx = document.getElementsByName(radioname);
  
  for (var i=0; i<chx.length; i++) {
    // If you have more than one radio group, also check the name attribute
    // for the one you want as in && chx[i].name == 'choose'
    // Return true from the function on first match of a checked item
    if (chx[i].type == 'radio'&& chx[i].checked) {
     
      return true;

    } 
  }
  // End of the loop, return false
  return false;
}