<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Envoi sans frais</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">



  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.css">

  <link rel="stylesheet" href="../asset/css/templatemo-hexashop.css">

  <link rel="stylesheet" href="../asset/css/owl-carousel.css">

  <link rel="stylesheet" href="../asset/css/lightbox.css">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>

  <style>
    .img{
        width: 626px;
        height: 1126px;
    }
    </style>
</head>

<body>
    <div class="profilbody">
        @yield('content')
    </div>
</body>
<script src="{{ asset('js/post/updatepost.js') }}"></script>



    <!-- jQuery -->
    <script src="../asset/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../asset/js/popper.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../asset/js/owl-carousel.js"></script>
    <script src="../asset/js/accordions.js"></script>
    <script src="../asset/js/datepicker.js"></script>
    <script src="../asset/js/scrollreveal.min.js"></script>
    <script src="../asset/js/waypoints.min.js"></script>
    <script src="../asset/js/jquery.counterup.min.js"></script>
    <script src="../asset/js/imgfix.min.js"></script>
    <script src="../asset/js/slick.js"></script>
    <script src="../asset/js/lightbox.js"></script>
    <script src="../asset/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="../asset/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>

</html>
