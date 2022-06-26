<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

</head>
<style>
    .toast {
        width: 100%;
        margin-bottom: 20px;
    }
</style>

<body class="authentication-bg"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:true, &quot;showRightSidebarOnStart&quot;: true}"
    data-leftbar-theme="dark" style="visibility: visible;">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Đăng ký dịch vụ</h4>
                                <p class="text-muted mb-4">Dịch vụ cung cấp tra cứu điểm và theo dõi điểm qua mail</p>
                            </div>
                            @if (session('message'))
                                <div class="toast d-flex align-items-center text-white bg-primary border-0"
                                    role="alert">
                                    <div class="toast-body">
                                        {{ session('message') }}
                                    </div>
                                    <button type="button" class="btn-close btn-close-white ms-auto me-2"></button>
                                </div>
                            @endif
                            <form action="{{ route('rservice.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="MSV" class="form-label">Mã sinh viên</label>
                                    <input class="form-control" type="text" id="MSV" name="MSV"
                                        placeholder="Nhập mã sinh viên của bạn ..." required="">
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        required="" placeholder="Nhập email của bạn ...">
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit"> Đăng ký </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

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

    <script>
        $(document).ready(function() {
            $('.btn-close').click(function(e) {
                e.preventDefault();
                $('.toast').attr('style', 'display: none !important');
            });
        });
    </script>

</body>

</html>
