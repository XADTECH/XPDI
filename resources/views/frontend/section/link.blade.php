 <!-- Google fonts -->
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
     rel="stylesheet">

 <!-- Favicon -->
 <link rel="icon" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">



 <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/animated-headline.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/tooltipster.bundle.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/plyr.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/jquery-te-1.4.0.css') }}">

 <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

 <style>
     .description-collapsible {
         max-height: 100px;
         /* Limit height for collapsed view */
         overflow: hidden;
         /* Hide overflow content */
         transition: max-height 0.3s ease;
         /* Smooth transition for toggle */
     }

     .description-collapsible.expanded {
         max-height: none;
         /* Remove height restriction for expanded view */
     }


     .bio-collapsible {
         max-height: 600px;
         /* Limit height for collapsed view */
         overflow: hidden;
         /* Hide overflow content */
         transition: max-height 0.3s ease;
         /* Smooth transition */
     }

     .bio-full-text {
         display: none;
         /* Initially hide full bio content */
     }

     .bio-collapsible.expanded {
         max-height: none;
         /* Remove height restriction for expanded view */
     }
 </style>
