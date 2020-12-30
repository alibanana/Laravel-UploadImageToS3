<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minimalista - New Amazing HTML5 Template</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/responsee.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/owl-carousel/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/lightcase.css') }}">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="{{ asset('/assets/css/template-style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,400,600,900&subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="{{ asset('/assets/js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/jquery-ui.min.js') }}"></script>      
  </head>

  <body class="size-1140">
      <!-- HEADER -->
      <header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">    
        <!-- Top Navigation -->
        <nav class="background-transparent background-transparent-hightlight full-width sticky">
          <div class="s-12 l-10">
            <div class="top-nav right">
              <p class="nav-text"></p>
              <ul class="right chevron">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about-us') }}">About Us</a></li>
                @auth
                  <li><a href="{{ url('/home') }}">Folders</a></li>
                @else
                  <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register')) 
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                @endauth
              </ul>
            </div>
          </div>  
        </nav>
      </header>
      
      <!-- MAIN -->
      <main role="main">
        <!-- Content -->
        <article>
          <header class="section background-white">
            <div class="line text-center">        
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">Laravel - Upload To S3</h1>
              <p class="margin-bottom-0 text-size-16 text-dark">This is our final project for Cloud & Distributed Systems course. Our aim was to utilized solely AWS services for the whole project; here we have used RDS for the database, S3 to store the files, and Beanstalk to host the website itself.</p>
            </div>  
          </header>
          <div class="background-white full-width"> 
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-01.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-02.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-03.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-04.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-05.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-06.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-07.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-08.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-09.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-10.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-11.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-12.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-01.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-02.jpg') }}" alt=""/>
              </a>	
            </div>
            <div class="s-12 m-6 l-five">
              <a class="image-with-hover-overlay image-hover-zoom" title="Portfolio Image">
                <img class="full-img" src="{{ asset('/assets/img/portfolio/thumb-03.jpg') }}" alt=""/>
              </a>	
            </div>
          </div>  
        </article>
      </main>
      
      <!-- FOOTER -->
      <footer>
        <!-- Bottom Footer -->
        <section class="padding background-dark full-width">
          <div class="text-center">
            <p class="text-size-12">Copyright 2019, Vision Design - graphic zoo</p>
            </div>
        </section>
      </footer>
    </div>
    <script type="text/javascript" src="{{ asset('/assets/js/responsee.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/jquery.events.touch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/owl-carousel/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/template-scripts.js') }}"></script> 
  </body>
</html>