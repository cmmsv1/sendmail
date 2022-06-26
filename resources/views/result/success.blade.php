<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lock Screen | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

</head>

<body class="authentication-bg"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:true, &quot;showRightSidebarOnStart&quot;: true}"
    data-leftbar-theme="dark" style="visibility: visible;">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <i class="uil uil-check-circle" style="font-size: 40px; color: green"></i>
                                <h4 class="text-dark-50 text-center mt-3 fw-bold">Đăng ký thành công </h4>

                            </div>

                            @if ($message)
                                <p class="text-muted mb-4 mt-3" style="font-size: 16px">{{ $message }}</p>
                            @endif
                            <div class="mb-0 text-center">
                                <a href="/" class="btn btn-primary" type="submit">Quay lại trang chủ</a>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card-->
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>



</body>

</html>
