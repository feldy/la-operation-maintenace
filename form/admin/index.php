<?php 
    include("config/configuration.php");
?>
<!DOCTYPE html>
<html>
	<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Dashboard Admin</title>

	    <link href="../../lib/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">

	    <link href="../../lib/css/animate.css" rel="stylesheet">
	    <link href="../../css/default.css" rel="stylesheet">
	    <link href="../../lib/css/style.css" rel="stylesheet">
	    
	    <link href="../../lib/css/plugins/summernote/summernote.css" rel="stylesheet">
	    <link href="../../lib/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
        <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">


         <!-- Mainly scripts -->
        <script src="../../lib/js/jquery-2.1.1.js"></script>
        <script src="../../lib/js/bootstrap.min.js"></script>
        <script src="../../lib/js/jquery-ui.js"></script>
        
        <!-- SUMMERNOTE -->
        <script src="../../lib/js/plugins/summernote/summernote.min.js"></script>
        <!-- Main JS -->
        <script src="../../js/main-admin.js"></script>
        <!-- Flot -->
        <script src="../../lib/js/plugins/flot/jquery.flot.js"></script>
        <script src="../../lib/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../../lib/js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="../../lib/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="../../lib/js/plugins/flot/jquery.flot.pie.js"></script>
        <script src="../../lib/js/plugins/flot/jquery.flot.symbol.js"></script>
        <script src="../../lib/js/plugins/flot/jquery.flot.time.js"></script>
        <!-- EayPIE -->
        <script src="../../lib/js/plugins/easypiechart/jquery.easypiechart.js"></script>

	</head>
	<body >
	    <?php 
	        if(isset($_GET['page'])) {
	            if ($_GET['page'] == 'dashboard') {
	                include("dashboard.php");
	            } else if ($_GET['page'] == 'noc') {
                    include("noc.php");
                } 
	        } else {
	           include("../login.php");
	    ?>	
	    <?php } ?>
	</body>
</html>