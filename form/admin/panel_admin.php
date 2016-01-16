<!DOCTYPE html>
<html>
	<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Dashboard Admin</title>

	    <link href="../../lib/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">

	    <link href="../../lib/css/animate.css" rel="stylesheet">
	    <link href="css/default.css" rel="stylesheet">
	    <link href="../../lib/css/style.css" rel="stylesheet">
	    
	    <link href="../../lib/css/plugins/summernote/summernote.css" rel="stylesheet">
	    <link href="../../lib/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

	</head>
	<body >
	    <?php 
	        if(isset($_GET['page'])) {
	            if ($_GET['page'] == 'dashboard') {
	                include("dashboard.php");
	            } else {
	                include("dashboard.php");
	            }
	        } else {
	    ?>	
	    <?php } ?>

	    <!-- Mainly scripts -->
	    <script src="../../lib/js/jquery-2.1.1.js"></script>
	    <script src="../../lib/js/bootstrap.min.js"></script>
	    <!-- SUMMERNOTE -->
	    <script src="../../lib/js/plugins/summernote/summernote.min.js"></script>
	    <!-- Main JS -->
	    <script src="../../js/main.js"></script>

	</body>
</html>