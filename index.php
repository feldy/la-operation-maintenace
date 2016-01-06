<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="lib/css/animate.css" rel="stylesheet">
    <link href="lib/css/style.css" rel="stylesheet">
    <link href="lib/css/plugins/switchery/switchery.css" rel="stylesheet">

</head>

<body >
    <div class="row border-bottom text-center">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span>Notification</span>
                </li>
                <li class="dropdown" style="margin-right: 0px !important;">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <?php 
        if(isset($_GET['page'])) {
            if ($_GET['page'] == 'VSAT') {
                include("form/VSAT.php");
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
                    <button class="btn btn-warning dim btn-large-dim" style="width: 100%;" type="button"><i class="fa fa-wifi"></i> Wireless</button>
                    <button class="btn btn-danger  dim btn-large-dim" style="width: 100%;" type="button"><i class="fa fa-plug"></i> Wireline</button>
                </div>
            </div>
        </div>
        <!-- <div class="wrapper wrapper-content" style=""> -->
    </div>
    <?php } ?>

    <!-- Switchery -->
    <script src="lib/js/plugins/switchery/switchery.js"></script>
    <script src="js/main.js"></script>
    <!-- Mainly scripts -->
    <script src="lib/js/jquery-2.1.1.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>

</body>

</html>
