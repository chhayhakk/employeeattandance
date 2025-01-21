<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HR SYS ST3.4</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('dist/css/admin.css') }}"> --}}
</head>
<body class="hold-transition sidebar-mini">
    
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link" style="font-family: Kantumruy Pro;">ទំព័រដើម</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('logout') }}" class="nav-link" style="font-family: Kantumruy Pro;">ចាក់ចេញ</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #11171d">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('assets/img/SETEClogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Employee Attendance</span>
        </a>

        <!-- menu -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image position-relative">
                    <input type="file" id="profile__avatar_input" style="display:none"></input>
                    <img src="{{ Auth::user()->profile ? asset('storage/image/' . Auth::user()->profile) : asset('dist/img/avatar.svg') }}" class="img-circle elevation-2" alt="User Image" id="profile__avatar" >
                    <span class="online-indicator"></span>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ strtoupper(Auth::user()->name) }}</a>
                </div>
            </div>
            

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}"
                           class="nav-link {{ url()->current() == url('/admin')? 'active' : '' }}"
                        >
                            <i class="nav-icon fas fa-tv"></i>
                            <p style="font-family: Kantumruy Pro">
                                ផ្ទាំងគ្រប់គ្រង
                            </p>
                        </a>
                    </li>
                    @if(auth()->user()->role=='admin')
                    <li class="nav-item">
                        <a href="{{ url('/admin/user') }}"
                           class="nav-link {{ url()->current() == url('/admin/user') || url()->current() == url('/admin/search_users') ? 'active' : '' }}"
                        >
                            <i class="nav-icon fas fa-users"></i>
                            <p style="font-family: Kantumruy Pro">
                                អ្នកប្រើប្រាស់
                                <span class="right badge badge-danger">10</span>
                            </p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{url('/admin/attendance')}}"class="nav-link {{ url()->current() == url('/admin/attendance') ? 'active' : '' }}"
                            >
                            <i class="nav-icon far fa-clock"></i>
                            <p style="font-family: Kantumruy Pro">
                                វត្តមាន
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item menu-open1">
                        <a href="#" class="nav-link active1">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Starter Pages
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Active Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inactive Page</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </aside>

    @yield('content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer" style="text-align: center">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want 💜
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('d-m-yyyy') }} <a href="https://adminlte.io">www.employeeattendance.com.kh</a>.</strong> All
        rights reserved.
    </footer>
</div>
<script>
    // Function to read and display selected avatar image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile__avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

            // Prepare form data for AJAX
            var formData = new FormData();
            formData.append('file', input.files[0]);

            // Send AJAX request to upload the file
            $.ajax({
                url: '{{ route('upload-avatar') }}', // Adjust route name if necessary
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('File uploaded successfully:', response);
                    // Ensure response contains path attribute
                    if (response.path) {
                        $('#profile__avatar').attr('src', response.path);
                        Swal.fire({
                        icon: 'success',
                        title: 'File Upload Success',
                        text: 'You have updated your profile.'
                    });
                    } else {
                        console.error('No path in response:', response);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('File upload failed:', textStatus, errorThrown);
                    Swal.fire({
                        icon: 'error',
                        title: 'File Upload Failed',
                        text: 'An error occurred while uploading the file.'
                    });
                }
            });
        }
    }

    // Trigger file input click when avatar image is clicked
    $('#profile__avatar').on('click', function() {
        $('#profile__avatar_input').click();
    });

    // Handle file input change event
    $('#profile__avatar_input').on('change', function() {
        readURL(this);
    });
</script>
<!-- jQuery -->

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
