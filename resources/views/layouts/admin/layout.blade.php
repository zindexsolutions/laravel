<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield("page-title")</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    @include("layouts.admin.stylesheet")

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    @include("layouts.admin.scripts")
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        @include("layouts.admin.main-header")

        @include("layouts.admin.sidebar")


        @yield("content")

        @include("layouts.admin.footer")

        <div class="control-sidebar-bg"></div>

    </div>
</body>
</html>
