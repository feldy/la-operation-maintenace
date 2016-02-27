<?php
    function showErrorMessage(msg, title) {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="widget red-bg p-lg text-center">
            <div class="m-b-md">
                <h1 class="m-xs"><i class="fa fa-frown-o fa-2x"></i></h1>
                <h3 class="font-bold no-margins">
                    <?php echo $title; ?>
                </h3>
                <small><?php echo $msg; ?></small>
            </div>
        </div>
    </div>
</div>
<?php } ?>