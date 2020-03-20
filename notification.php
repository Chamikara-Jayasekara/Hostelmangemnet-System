<?php
require_once 'assets/php/header.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel Management system</title>
    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <link rel="stylesheet" href="assets/php/css/navstyle.css">
</head>
<body>
<div class="row mt-4">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" id="displayLatePassNotification">

    </div>
    <div class="col-lg-2"></div>
</div>

</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script>
    $(document).ready(function(){
        var touch 	= $('#resp-menu');
        var menu 	= $('.menu');

        $(touch).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });

        $(window).resize(function(){
            var w = $(window).width();
            if(w > 767 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
        $("#b").click(function (e) {
            $("#a").hide();
        });
        displayLatePassNotification();
        function  displayLatePassNotification() {
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: { action: 'displayLatePassNotification'},
                success:function (response) {
                    $('#displayLatePassNotification').html(response);
                }
            });
        }
    });
</script>
</body>
</html>
