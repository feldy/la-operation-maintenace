<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="lib/css/animate.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="lib/css/style.css" rel="stylesheet">
    
    <link href="lib/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="lib/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

</head>

<body >
    <?php 
        if(isset($_GET['page'])) {
            if ($_GET['page'] == 'VSAT') {
                include("form/mobile/VSAT.php");
            } else if ($_GET['page'] == 'WIRELESS') {
                include("form/mobile/WIRELESS.php");
            } else if ($_GET['page'] == 'WIRELINE') {
                include("form/mobile/WIRELINE.php");
            }
        } else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="middle-box text-center loginscreen  animated fadeInDown" style="margin-top: 0px;">
                <div>
                    <div><img src="images/logo.png" class="img-responsive"></div>
                    <h3>Operation and Maintenance</h3>
                    <button class="btn btn-primary dim btn-large-dim" style="width: 100%;" type="button" onclick="window.location.href = '?page=VSAT'"><i class="fa fa- fa-paper-plane-o"></i> VSAT</button>
                    <button class="btn btn-warning dim btn-large-dim" style="width: 100%;" type="button" onclick="window.location.href = '?page=WIRELESS'"><i class="fa fa-wifi"></i> Wireless</button>
                    <button class="btn btn-danger  dim btn-large-dim" style="width: 100%;" type="button" onclick="window.location.href = '?page=WIRELINE'"><i class="fa fa-plug"></i> Wireline</button>
                </div>
            </div>
        </div>
        <!-- <div class="wrapper wrapper-content" style=""> -->
    </div>
    <?php } ?>

    <!-- Mainly scripts -->
    <script src="lib/js/jquery-2.1.1.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <!-- SUMMERNOTE -->
    <script src="lib/js/plugins/summernote/summernote.min.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>

</html>
