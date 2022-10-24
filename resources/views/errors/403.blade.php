
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <!-- Title of Website -->
  <title> {{ config('app.name') }}</title>

  <meta name="description"
        content="Coming Soon Landing Page"/>
  <meta name="keywords"
        content="Kounter, html theme, Coming Soon Landing Page, Coming Soon Landing Page template, html landing page, one page, responsive landing page"/>
  <meta name="author" content="Egotype">
    <meta name="yandex-verification" content="38ea5b399d822cd3" />

  <!-- Favicon -->
  <link rel="icon" href="favicon.png" type="image/png">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{url('pasif/css/plugins/bootstrap.min.css')}}">

  <!-- Font Icons -->
  <link rel="stylesheet"
        href="{{url('pasif/css/icons/font-awesome.css')}}">
  <link rel="stylesheet"
        href="{{url('pasif/css/icons/linea.css')}}">

  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="{{url('pasif/css/plugins/loaders.min.css')}}">
  <link rel="stylesheet" href="{{url('pasif/css/plugins/photoswipe.css')}}">
  <link rel="stylesheet" href="{{url('pasif/css/icons/photoswipe/icons.css')}}">




  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{url('pasif/css/style.css')}}">

  <!-- Responsive CSS -->
  <link href="{{url('pasif/css/responsive.css')}}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body data-spy="scroll" data-target=".scrollspy" class="bg-dark">

<!-- Preloader  -->
<div class="loader bg-dark">
  <div class="loader-inner ball-scale-ripple-multiple ball-scale-ripple-multiple-color">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- /End Preloader  -->


<div id="page">

  <!-- ============================
       BG & Overlays
  ================================= -->

  <!-- Rain Image BG -->
  <div class="section-overlay media">
    <img id="page-rain" alt="" src="{{url('pasif/images/page-image-rain.jpg')}}">
  </div>
  <!-- /End Rain Image  BG -->

  <!-- Modal -->
  <div id="modal-notify" class="modal fade modal-scale" tabindex="-1" role="dialog"
       aria-labelledby="meinModalLabel">

    <!-- .modal-dialog -->
    <div class="modal-dialog" role="document">
      <div>

        <!-- .modal-content -->
        <div class="modal-content text-center bg-dark text-light">
          <button class="button-close" data-dismiss="modal" aria-label="Close"><i
              class="icon icon-lg icon-arrows-remove"></i></button>


        

          <div class="p-t-b-30">

            <!-- Newsletter Form:
             alternative newsletter form via email;
             write your email in newsletter-process.php and use:
             <form action="php/newsletter-process.php" id="newsletter-form" method="post"> insted of
             <form id="mc-form"> -->
            <form id="mc-form">

              <!-- Input Group -->
              <div class="input-group">
                <input type="email" id="email" class="form-control form-control-light"
                       name="email"
                       placeholder="Enter your Email here...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-color"><i
                        class="icon icon-sm icon-arrows-slim-right-dashed"></i>
                    </button>
                  </span>
              </div>
              <!-- /End Input Group -->

              <!-- Message Alert -->
              <div id="message-newsletter" class="message-wrapper text-white message">

                <span><i class="icon icon-sm icon-arrows-slim-right-dashed"></i><label
                    class="message-text" for="email"></label></span>
              </div>
              <!-- /End Message Alert -->

            </form>
            <!-- /End Newsletter Form -->

          </div>
        </div>

      </div>
      <!-- /End .modal-content -->
    </div>
    <!-- /End .modal-dialog -->
  </div>
  <!-- /End Modal -->

  <!-- ============================
       Header Navigation
  ================================= -->


  <div class="container-fluid">
    <div class="row">


      <!-- ============================
           Info
      ================================= -->

      <div id="info" class="col-md-12 text-white text-center page-info col-transform">
        <div class="vert-middle">
          <div class="reveal scale-out">

            <!-- Logo -->
            <div class="p-t-b-15">
              <img style="height: 70px" class="logo" src="{{url('assets/images/logo/logo.svg')}}"  alt="">
            </div>
            <!-- /End Logo -->

            <div class="p-t-b-15">
              <!-- Headline & Description -->
              <h2><span class="font-weight-200">HOŞGELDİNİZ</span><br>ŞU ANDA SİTEMİZ BAKIMDADIR!</h2>
              <p> {{ config('app.name') }}</p>

              <!-- <p>We're coming soon! Awesome template to present your future product or service.<br>We're
                working hard to give you the best experience!<br> -->
              </p>
              <!-- /End Headline & Description -->
            </div>
            <!-- Arrow -->
       		
            <!-- /End Arrow -->

            <!-- Buttons -->
           <!--  <div class="p-t-b-15 btn-row">
              <button class="btn btn-color" data-toggle="modal"
                      data-target="#modal-notify"
                      role="button">Notify me
              </button>
              <a class="btn btn-border-white show-info"
                 role="button" data-href="#content">
                More info
              </a>
            </div> -->
            <!-- /End Buttons -->

          
          

          </div>
        </div>
      </div>



    </div>
  </div>

</div>
<!-- /#page -->
<div id="photoswipe"></div>

<!-- Scripts -->
<script src="{{url('pasif/js/plugins/jquery1.11.2.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/scrollreveal.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/contact-form.js')}}"></script>
<script src="{{url('pasif/js/plugins/newsletter-form.js')}}"></script>
<script src="{{url('pasif/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/rainyday.min.js')}}"></script>
<script src="{{url('pasif/js/plugins/prefixfree.min.js')}}"></script>

<!-- Custom Script -->
<script src="{{url('pasif/js/custom.js')}}"></script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48573898-7', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
