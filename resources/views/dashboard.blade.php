@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-family: Kantumruy Pro">ផ្ទាំងគ្រប់គ្រង</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">អ្នកប្រើប្រាស់</a></li>
                            <li class="breadcrumb-item active">ផ្ទាំងគ្រប់គ្រង</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if(auth()->user()->role=='admin')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 style="font-family: Kantumruy Pro">{{ auth()->user()->count() }}</h3>


                                <p style="font-family: Kantumruy Pro">អ្នកប្រើប្រាស់</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" style="font-family: Kantumruy Pro" class="small-box-footer">ព័ត៏មានបន្ថែម <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="font-family: Kantumruy Pro">ព័ត៏មានបន្ថែម <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="font-family: Kantumruy Pro">ព័ត៏មានបន្ថែម <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="font-family: Kantumruy Pro">ព័ត៏មានបន្ថែម  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                </div>
                @endif
                
                <div class="row">
                    
                    <div class="col-12 bg-primary">
                        <a href="{{route('clock_in').'?id='. auth()->user()->id}}" id="clockInOutButton">
                        <button class="btn btn-primary w-100" id="clockInOutButton" type="button" style="height:15vh">
                            <i class="fas fa-user-clock" ></i>
                            <span style="font-size:24px" id="clockInOutButtonText" >
                                @if (auth()->user()->clock_in)
                                Clock Out
                            @else
                                Clock In
                            @endif
                        </span>
                       
                        </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if(session('ip_error'))
            Swal.fire({
                icon: 'error',
                title: 'Connection Error',
                text: 'Please connect to company wifi',
                confirmButtonText: 'OK'
            });
        @endif
    
        @if(session('clock_in_error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Clock-In Error',
                    text: 'You are already clocked in today.',
                    confirmButtonText: 'OK'
                });
        @endif
    
        @if(session('success_clock_in'))
                Swal.fire({
                    icon: 'success',
                    title: 'Clock-In Success',
                    text: 'You have successfully clocked in.',
                    confirmButtonText: 'OK'
                }).then(function() {
            // Update button text to "Clock Out" and route to 'clock_out' after successful clock-in
            $('#clockInOutButton').attr('href', "{{ route('clock_out') . '?id=' . auth()->user()->id }}");
            $('#clockInOutButtonText').text('Clock Out');
        });
        @endif
        @if(session('success_clock_out'))
                Swal.fire({
                    icon: 'success',
                    title: 'Clock-Out Success',
                    text: 'You have successfully clocked out.',
                    confirmButtonText: 'OK'
                }).then(function() {
            // Update button text to "Clock In" and route to 'clock_in' after successful clock-out
            $('#clockInOutButton').attr('href', "{{ route('clock_in') . '?id=' . auth()->user()->id }}");
            $('#clockInOutButtonText').text('Clock In');
        });
        @endif
        

       
   
    </script>
    
@endsection
