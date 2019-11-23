<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Moving Companion</title>
    <link rel="stylesheet" href="css/style.css">
	

</head>
<body>
		
		<div id="auto" style="background-color:blue; padding:20px;"></div>
	<script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
	function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
	$(document).ready(function(){
		$('#auto').load('load.php');
		refresh();
	});
	
	function refresh()
	{
		setTimeout(function() {
			$('#auto').fadeOut('slow').load('load.php').fadeIn('slow');
			refresh();
			},2000);
			
	}
	</script>	
	
	<h2 id="greeting" class="greeting">Where do you want to live?</h2>


    <form id="form-container" class="form-container">
        
        <label for="city">City: </label><input type="text" id="city" value="" onkeyup="showHint(this.value)">
        <p>Suggestions: <span id="txtHint"></span></p>
		<button id="submit-btn"  id ="srch" action="gethint.php">Submit</button>
		
    </form>

    <hr>

    


    <div class="wikipedia-container">
        <h3 id="wikipedia-header">Relevant Wikipedia Links</h3>
        <ul id="wikipedia-links">Type in an address above and find relevant Wikipedia articles here!</ul>
    </div>

	


















	
    <div class="nytimes-container">
        <h3 id="nytimes-header">New York Times Articles</h3>
        <ul id="nytimes-articles" class="article-list">What's going on in your new city? Enter an address and hit submit and the NY Times will tell you here!</div>
    </div>
	
			<div id="container"><h1>Take notes from article</h1>
		<input type="text" id="name" placeholder="Type here and press Enter">
	</div>

	<div id="result"></div>
	<script type="text/javascript" src="js/libs/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#name').focus();
			$('#name').keypress(function(event) {
				var key = (event.keyCode ? event.keyCode : event.which);
				if (key == 13) {
					var info = $('#name').val();
					$.ajax({
						method: "POST",
						url: "action.php",
						data: {name: info},
						success: function(status) {
							$('#result').append(status);
							$('#name').val('');
						}
					});
				};
			});
		});
	</script>

    <script src="js/libs/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>