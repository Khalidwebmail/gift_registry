<!doctype html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $pageInfo[0];?> | My Gift</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('frontend/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('frontend/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('frontend/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('frontend/css/custom_style.css')}}">
    
    
    
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- User style -->
    
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    @if($pageInfo[2] == 'rating')
    <!-- star rating -->
    <link rel="stylesheet" href="{{asset('frontend/css/star-rating.css')}}">
    @endif
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{asset('frontend/css/style-customizer.css')}}">
    <link href="#" data-style="styles" rel="stylesheet">
    @if($pageInfo[2] == 'rating')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    @endif
    
    <!-- Modernizr JS -->
    <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://use.fontawesome.com/45653cb24f.js"></script>
    @if($pageInfo[2] == 'rating')
    <script src="{{asset('frontend/js/star-rating.js')}}"></script>
    @endif
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>