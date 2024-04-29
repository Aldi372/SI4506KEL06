<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Rescue</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body style="background-color: #377E4E">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('admin.auth.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username" class="font-weight-bold">Username</label>
                                    <input type="text" class="form-control form-control-user" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="font-weight-bold">Password</label>
                                    <input type="password" class="form-control form-control-user" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #377E4E; border-color: #377E4E">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    @error('password')
        <script>
            Swal.fire({
                title: "Failed!",
                text: "Incorrect Credential",
                icon: "error"
            });
        </script>
    @enderror
</body>

</html>
