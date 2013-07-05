<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Jediscript Kris Kringler -> Shuffling names for a kris kringle partners">
		<meta name="author" content="Jed Lagunday">
		<title>jediscript &raquo; Kris Kringler</title>
		<link href="../favicon.ico" rel="shortcut icon" type="image/ico" />
		<link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
		<link type='text/css' rel='stylesheet' href='../jediscript.css'>
		<link type='text/css' rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
		<link type='text/css' rel='stylesheet' href='../bootstrap/css/bootstrap-responsive.min.css'>
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container headline">
			<br>
			<a href="https://github.com/jediscript/KrisKringler" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
			<h1 class="changeFont">Kris Kringlers <small><i id="helpTooltip" title="Type the number of participants and hit submit. Then enter the name/codename of the participants. Then hit Go!" data-placement="right" class="icon-question-sign"></i></small></h1>
			<div class="social_sharing"> 
		        <div class="tweeting pull-left">
		        	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://jediscript.com/kriskringler" data-via="jeditweets" data-lang="en">Tweet</a>
		        	<div class="g-plusone" data-size="medium" data-href="http://jediscript.com/kriskringler"></div>
		        </div>
		        <div class="fb_liker pull-left">
		        	<div class="fb-like" data-href="http://jediscript.com/kriskringler" data-send="false" data-layout="button_count" data-width="400" data-show-faces="true"></div>
		        </div>
		    </div>
		    <br><br>
			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="noOfKringlers">How many Kringlers?</label>
					<div class="controls">
						<input type="text" id="noOfKringlers" placeholder="100">
						<button class="btn" onclick="generateForm();">Submit</button>
					</div>
				</div>
			</div>
			<div id="kringlers">
			</div>
			<div id="footer"></div>
			<footer>
				<p class="pull-left changeFont"><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>">&copy; Jediscript <?php echo date('Y')?> </a></p><a class="pull-right" href="../contact.php">Catch up!</a>
			</footer>
		</div> <!-- /.container -->
		
	</body>
	<script type='text/javascript' src='../bootstrap/js/jquery.js'></script>
	<script type='text/javascript' src='../bootstrap/js/bootstrap.js'></script>
	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=544538788897588";
  		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <script type="text/javascript">
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
	<script type="text/javascript">
		function generateForm(){
			if($("#noOfKringlers").val() == "" || isNaN($("#noOfKringlers").val())){
				alert("Please put a valid number");
			}else{
				var num = $("#noOfKringlers").val();
				var kringlers = "<form id='kringlersForm' class='form-horizontal' action='kringler.php' method='post'>";
				for(var i=1; i <= num; i++){
					kringlers += "<div class='control-group'>";
						kringlers += "<label class='control-label' for='kringler_"+i+"'>"+i+"</label>";
						kringlers += "<div class='controls'>";
							kringlers += "<input type='text' name='kringlers[]' id='kringler_"+i+"'>";
						kringlers += "</div>";
					kringlers += "</div>";
				}
				kringlers += "<div class='control-group'>";
					kringlers += "<div class='controls'>";
						kringlers += "<input class='btn' type='submit' value='Go!'>";
					kringlers += "</div>";
				kringlers += "</div>";
				kringlers += "</form>";
				kringlers += "<script type='text/javascript'>";
					kringlers += "$('#kringlersForm').submit(function(){ if(validateForm("+num+").length > 0){ return false; } });";
				kringlers += "</"+"script>";
				$("#kringlers").html(kringlers);
			}
		}

		$("#kringlersForm").submit(function(){
			alert("submit pressed");
			console.log("submit pressed");
			return false;
		});

		function validateForm(num){
			var count = num;
			var message = "";
			for(i = 1; i <= count; i++){
				$("#kringler_"+i).val() = $("#kringler_"+i).val().replace(/(<([^>]+)>)/ig,"");
				if($("#kringler_"+i).val() == "" || !isNaN($("#kringler_"+i).val())){
					message += i+" is empty or not valid\n";
				}
			}
			if(message.length > 0){
				alert(message);
			}
			return message;
		}

		$("#helpTooltip").tooltip('hide');
	</script>
</html>