<?php
function krisKringler($participants) {
    shuffle($participants);
    $partners = array();
    for($i = 0; isset($participants[$i]); $i++) {
        $partners[$participants[$i]] = $participants[($i+1)%count($participants)];
    }
    return $partners;
}

if(isset($_POST['kringlers'])){
	$participants = $_POST['kringlers'];
	$participants = trim($participants);
	$participants = filter_input_array($participants);
}else{
	$participants = null;
}

?>

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
			<h1 class="changeFont">Result</h1>
			<div class="span12">
			<?php 
			echo '<table id="kriskringled" class="table table-bordered table-hover span6">';
			echo '<thead><tr><th>Name</th><th>Partner</th></tr></thead><tbody>';
			foreach (krisKringler($participants['kringlers']) as $key => $value) {
			    echo "<tr><td>".strip_tags($key)."</td><td>".strip_tags($value)."</td></tr>";
			}
			echo '</tbody></table>';
			?>
			</div>
			<button class="btn btn-primary" onclick="goBack();">Back</button>
			<div id="footer"></div>
			<footer>
				<p class="pull-left changeFont"><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>">&copy; Jediscript <?php echo date('Y')?> </a></p><a class="pull-right" href="../contact.php">Catch up!</a>
			</footer>
		</div>
	</body>
	<script type='text/javascript' src='../bootstrap/js/jquery.js'></script>
	<script type='text/javascript' src='../bootstrap/js/bootstrap.js'></script>
	<script type="text/javascript">
	function goBack(){
		history.back();
		return false;
	}
	</script>
</html>