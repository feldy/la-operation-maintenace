<?php
	error_reporting(E_ALL); 
	// $conn = mysqli_connect("mysql.idhostinger.com","u346528017_la","admin12345");
	// mysqli_select_db($conn, 'u346528017_la') or die(mysqli_error($conn));

	$conn = mysqli_connect("localhost","root","admin");
	mysqli_select_db($conn, 'db_lintas_arta') or die(mysqli_error($conn));

	function gen_uuid() {
	    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        // 32 bits for "time_low"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

	        // 16 bits for "time_mid"
	        mt_rand( 0, 0xffff ),

	        // 16 bits for "time_hi_and_version",
	        // four most significant bits holds version number 4
	        mt_rand( 0, 0x0fff ) | 0x4000,

	        // 16 bits, 8 bits for "clk_seq_hi_res",
	        // 8 bits for "clk_seq_low",
	        // two most significant bits holds zero and one for variant DCE1.1
	        mt_rand( 0, 0x3fff ) | 0x8000,

	        // 48 bits for "node"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	    );
	}
?>
<?php
    function parsingBoolean($bool){
        if ($bool) {
            return "Ya";
        } else {
            return "Tidak";
        }

    }
?>
<?php
    function showDialog($title, $msg, $type, $href) {
    	$color = "lazur";
    	$emoticon = "smile";
    	if ($type == 'error') {
    		$color = 'red';
    		$emoticon = "frown";
    	}
?>
<style type="text/css">
	

</style>
<link href="../../lib/css/bootstrap.min.css" rel="stylesheet">
<link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="../../lib/css/animate.css" rel="stylesheet">
<link href="../../css/default.css" rel="stylesheet">
<link href="../../lib/css/style.css" rel="stylesheet">
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <div class="widget <?php echo $color;?>-bg p-lg text-center">
            <div class="m-b-md">
                <h1 class="m-xs"><i class="fa fa-<?php echo $emoticon; ?>-o fa-2x"></i></h1>
                <h3 class="font-bold no-margins">
                    <?php echo $title; ?>
                </h3>
                <small><?php echo $msg; ?></small>
                <?php 
                	if (!empty($href)) {
                		echo "<script>setTimeout(function(){window.location.href='".$href."'}, 2500)</script>";
                	}
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php
    function showDialogUtama($title, $msg, $type, $href) {
    	$color = "lazur";
    	$emoticon = "smile";
    	if ($type == 'error') {
    		$color = 'red';
    		$emoticon = "frown";
    	}
?>
<style type="text/css">
	

</style>
<link href="../lib/css/bootstrap.min.css" rel="stylesheet">
<link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="../lib/css/animate.css" rel="stylesheet">
<link href="../css/default.css" rel="stylesheet">
<link href="../lib/css/style.css" rel="stylesheet">
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <div class="widget <?php echo $color;?>-bg p-lg text-center">
            <div class="m-b-md">
                <h1 class="m-xs"><i class="fa fa-<?php echo $emoticon; ?>-o fa-2x"></i></h1>
                <h3 class="font-bold no-margins">
                    <?php echo $title; ?>
                </h3>
                <small><?php echo $msg; ?></small>
                <?php 
                	if (!empty($href)) {
                		echo "<script>setTimeout(function(){window.location.href='".$href."'}, 2500)</script>";
                	}
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>