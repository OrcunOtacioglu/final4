<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>2018 Turkish Airlines Euroleague Final Four Packages | Detur Official Travel Agency</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://detur.com/events/assets/css/style.css">
    <link rel="stylesheet" href="https://detur.com/events/assets/css/TimeCircles.css">
    <link rel="stylesheet" href="https://detur.com/events/assets/css/web-icons.css">
    <link rel="stylesheet" href="https://detur.com/events/assets/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
<div id="app">
    <!-- HEADER START -->
    <div class="header">
        <div class="header-wrapper">
            <div class="text-center logo-wrapper">
                <img src="http://www.detur.com/Images/logo-.png" alt="Detur Official Tranvel Agency">
            </div>
            <h1 class="text-center">2018 Turkish Airlines EuroLeague Final Four Belgrade</h1>
            <p class="text-center fs-25">Packages Will Be Available In</p>

            <!-- COUNTDOWN START -->
            <div class="countdown-wrapper">
                <div id="DateCountdown" class="countdown" data-date="2017-11-10 17:00:00"></div>
            </div>
            <!-- COUNTDOWN END -->

        </div>
    </div>
    <!-- HEADER END -->

    <footer>
        <p class="mb-5">© 2017 <a href="http://detur.com.tr">Detur</a> Official Travel Agency</p>
        <div class="footer-wrapper">
            <img src="https://detur.com/events/assets/img/detur-logo-dark.png" alt="Detur Official Travel Agency" height="25px">
            <img src="https://detur.com/events/assets/img/ELB-logo.png" alt="Euroleaegue Basketball" height="25px">
        </div>
    </footer>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://detur.com/events/assets/js/TimeCircles.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://detur.com/events/assets/js/presale.js"></script>
<script>
    $("#DateCountdown").TimeCircles({
        fg_width: 0.01
    });
</script>
<script>
    var category = $('#category');
    category.change(function () {
        var categoryID = category.find(':selected').val();
        app.changeSeatMap(categoryID);
    });
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>