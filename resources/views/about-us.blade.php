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
    <div id="page-wrapper">
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
          <header class="section-top-padding background-white">
            <div class="line text-center">        
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">About Us</h1>
              {{-- <p class="margin-bottom-0 text-size-16 text-dark">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.<br>
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p> --}}
            </div>  
          </header>
          <section class="section-top-padding background-white">
            <div class="line">
              <h2 class="text-s-size-40 text-size-50 text-line-height-1 margin-bottom-10 text-thin text-center"><span class="text-dark">-</span> Our Team <span class="text-dark">-</span></h2> 
              <p class="margin-bottom-50 text-center">
              Our group consists of Alifio Rasendriya Rasyid, Naman Vohra, Muchsin Hisyam<br>Jason Sianandar, and Fauzan Athallah Arief.
              </p>  
              <div class="carousel-blocks owl-carousel">                                                                                                            
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="{{ asset('/assets/img/alifio.jpg') }}" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Alifio Rasendriya Rasyid</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">2201798295</p>
                  </div>                                                                                                                                                              
                </div>
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="{{ asset('/assets/img/naman.jpg') }}" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Naman Vohra</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">2201798420</p>
                  </div>                                                                                                                                                              
                </div>
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="{{ asset('/assets/img/muchsin.jpg') }}" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Muchsin Hisyam</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">2201797430</p>
                  </div>                                                                                                                                                              
                </div>                
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="{{ asset('/assets/img/jason.jpg') }}" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Jason Sianandar</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">2201796440</p>
                  </div>                                                                                                                                                              
                </div>                
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="{{ asset('/assets/img/fauzan.jpg') }}" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Fauzan Athallah Arief</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">2201798326</p>
                  </div>                                                                                                                                                              
                </div>                              
              </div>                                                                                                                                                                                                                                                                                         
            </div> 
          </section>
          <section class="section background-white"> 
            <div class="line">      
            </div>
          </section>
        </article>
      </main>
      
      <!-- FOOTER -->
      <footer>

        <!-- Main Footer -->
        <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 0, 0, 0.80);">
        
        <!-- Bottom Footer -->
        <section class="padding background-dark full-width">
          <div class="text-center">
            <p class="text-size-12">Copyright 2019, Vision Design - graphic zoo</p>
            <p class="text-size-12">All images is purchased from Bigstock. Do not use the images in your website.</p>
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