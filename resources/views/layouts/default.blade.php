<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="God Bless Our Vets is here to support law enforcement.  Increasingly, the police
        are being made out to be the bad guy.  God Bless Our Vets is here to raise awareness for how the truth is being
        distorted and to remind us all how much we depend on the law, the police, and the truth.">
    <meta name="author" content="Gabriel Farago">
    <meta property="og:url" content="https://GodBlessOurVets.org" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="God Bless Our Vets" />
    <meta property="og:description" content="Support our veterans.  The selfless act of serving our country is why you and I have the freedom to live safely and pursue our dreams, to nuture our kids, and to live freely and happily." />
    <meta property="og:image" content="https://godblessourvets.org/img/godblessourvets-header.jpg" />
    <meta name="csrf-token" id="csrftoken" content="{{ csrf_token() }}" />
    <meta name="publishable-key" content="{{ \Config::get('services.stripe.key') }}">

    <!-- jquery loaded early -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Have all ajax calls include csrf token -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <title>God Bless Our Vets</title>

    <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel = "stylesheet">
    {{--<link href = "/css/basic80.css" rel = "stylesheet">--}}
    <link href = "/css/one-page-wonder.css" rel = "stylesheet">
    <link href = "/css/all-vets.css" rel = "stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vue.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.2/vue-resource.js"></script>

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/6ae7d95915.js"></script>

    @include('partials.facebook_pixel')
</head>

<body>
<!-- Facebook SDK -->
@include('partials.facebooksdk')

<!-- Navigation -->

<!-- Main Page Content -->
@include('flash::message')
@yield('content')
<br><br>

<!-- footer -->
<br><br>
@include('partials.publicfooter')

<!-- Bootstrap Core JavaScript -->
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script >

<!-- Flash Messaging -->
<script>
    // Fade flash msgs
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);

    // Flash overlay modal activation
    $('#flash-overlay-modal').modal();
</script>
@yield('scripts')
</body>
</html>
