<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Passific.fr - Cours</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	</head>
	<body>
		<div class="container">
			<div id="header" class="hero-unit">
				<h1>Cours ERII3</h1>
				<p>L'idéal pour réviser !</p>
				<p><a class="btn btn-primary btn-large" target="_blank" href="http://www.polytech-montpellier.fr/ERII/intranet/login.php">
					Cour Polytech &raquo;
				</a></p>
			</div>
			
			<div class="row">
				<div id="menu" class="span3">
					<h3>Les cours</h3>
					<ul class="nav nav-pills nav-stacked">
						<li><a href="?action=consulter">Consulter les cours</a></li>
						<li><a href="?action=ajouter">Ajouter un cours</a></li>
					</ul>
				</div>
				<div id="content" class="span9">
					<div id="form_content">
						<form action="upload.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="1234">
							<input type="file" name="file"><br>
							<input type="submit" id="thehardestbuttontobutton" onClick='submition();'>
						</form>
					</div>
					<div id="output"></div>
				</div>
			</div>
			
			<hr>
			
			<footer>
				<p>Passific &copy; 2012</p>
			</footer>	
		</div>
<script>
function getXMLHttpRequest(){var xhr=null;if(window.XMLHttpRequest||window.ActiveXObject){if(window.ActiveXObject){try{xhr=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}}else xhr=new XMLHttpRequest();}
else{document.getElementById("thehardestbuttontobutton").setAttribute('type','submit')/*ajaxnotsupported*/;return null;}return xhr;}function request(postdata){document.getElementById("form_content").style.display="none";/*document.getElementById("output").innerHTML="Patientez...";*/
var xhr=getXMLHttpRequest();xhr.onreadystatechange=function(){if(xhr.readyState==4&&(xhr.status==200||xhr.status==0)){readData(xhr.responseText);}};xhr.open("POST","progress.php",true);xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");xhr.send(postdata);}
function readData(sData){document.getElementById("output").innerHTML=sData;}
function submition()
{
	request('id=1234');
	setTimeout("submition()", 300);
}
</script>
</body>
</html>