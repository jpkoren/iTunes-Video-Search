<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Music Videos</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script>
		$(document).ready(function(){
	    	$('form').submit(function(e){
	        	$('#results').html("<img src='assets/default.gif'>");
	        	$.post($(this).attr('action'), $(this).serialize(), function(data) {
	          		var html_string = "";
	          		if(data.results.length !== 0) {
	            		html_string = "<video controls src='" +
	                    data.results[0].previewUrl +
	                    "'><\/video>";
	          		} 
	          		else {
	            		html_string = "Not Found";
	          		}
	          		$('#results').html(html_string);
	        	}, 'json');
	        return false;
	    	});
	  	});
		</script>
		<style>
			#container {
				margin: 0 auto;
				text-align: center;
				border: 2px solid black;
				background-color: lightblue;
				width: 940px;
				height: 800px;
			}
		</style>
	</head>
	<body>
		<div id="container">
	    	<h1>Enter Artist's Name:</h1>
	    	<form action="/main/get_movie" method="post">
	      		<input id="user_input" name="user_input" type="search">
	      		<input type="submit" value="search">
	    	</form>
	    	<p></p>
	    	<div id="results"></div>
	    </div>
  	</body>
</html>