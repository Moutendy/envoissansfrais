<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>


    <!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.css">

<link rel="stylesheet" href="../asset/css/templatemo-hexashop.css">

<link rel="stylesheet" href="../asset/css/owl-carousel.css">

<link rel="stylesheet" href="../asset/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>

    <body>
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2> <a href="{{ route('home') }}">Home</a></h2>
                        <span>cliquez sur l'image pour ajouter ce contact dans vos contacts.</span>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @if (!empty($contacts))
                                    @foreach ($contacts as $contactNewBysUsers)

                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <a href="{{ route('addcontact',$contactNewBysUsers->id) }}">
                                                @if (@empty($contactNewBysUsers->image_profil))
                                                <img src="../asset/images/explore-image-02.jpg" alt="">
                                                @endif
                                                <img src="{{ $contactNewBysUsers->image_profil }}" alt="">
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <h4>{{ $contactNewBysUsers->name }}</h4>
                                            <span>{{ $contactNewBysUsers->pays }}</span>
                                            <ul class="stars">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>

                                    @endforeach
                                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->

    <!-- ***** Social Area Ends ***** -->


    <!-- ***** Subscribe Area Ends ***** -->




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

  </body>
</html>
