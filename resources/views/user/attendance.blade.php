@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-family: Kantumruy Pro;">វត្តមាន</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item" style="font-family: Kantumruy Pro;"><a href="#">ទំព័រដើម</a>
                            </li>
                            <li class="breadcrumb-item active" style="font-family: Kantumruy Pro;">វត្តមាន</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <a href="{{ url('/admin/create_user') }}">

                                    <button type="button"
                                        style="font-family: Kantumruy Pro; border-color: #0069d9; border-radius: 5px; padding:5px 5px;color:#0069d9">
                                        <i class="fas fa-plus-circle" style=" color: #0069d9;"></i>
                                        បន្ថៃម
                                    </button>
                                </a>

                                <div id="loadingOverlay"
                                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; justify-content: center; align-items: center;">
                                    <img src="{{ asset('assets/img/loading.gif') }}"></img>
                                </div>

                                <a href="#">
                                    <button id="refreshAttendance" type="button"
                                        style="font-family: Kantumruy Pro; border-color: #931ab1; border-radius: 5px; padding:5px 5px;color:#931ab1">
                                        <i class="fas fa-sync-alt" style="color:#931ab1"></i>
                                        ទាញសារឡើងវិញ
                                    </button>
                                </a>


                                <div class="search-container d-flex float-right">
                                    <form class="d-flex"action="{{ route('searchAttendance') }}" method="GET">
                                        <input class="form-control me-2 mr-2" type="search" name="search"
                                            placeholder="ស្វែងរក" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">ស្វែងរក</button>
                                    </form>
                                </div>


                            </div>



                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    ល.រ</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    បុគ្គលិក</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    តួនាទី</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    កាលបរិច្ឆេទ</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    IP Clock In</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    IP_Clock Out</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    ម៉ោងចូល</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    ម៉ោងចេញ</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    វត្តមាន</th>
                                                <th
                                                    style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">
                                                    សកម្មភាព</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attendance as $item)
                                                <tr style="border-radius:5px;">
                                                    <td>{{ $item->user_id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->role }}</td>
                                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>

                                                    <td>
                                                        <span
                                                            style="text-transform: capitalize">{{ $item->clock_in_ip }}</span>
                                                    </td>
                                                    <td>{{ $item->clock_out_ip }}</td>
                                                    <td>

                                                        {{ \Carbon\Carbon::parse($item->clock_in)->format('H:i:s') }}

                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($item->clock_out)->format('H:i:s') }}
                                                    </td>

                                                    <td style="font-family: Kantumruy Pro" class="d-flex">
                                                        {{ $item->late }}

                                                    </td>
                                                    <td>
                                                        @if ($item->late > 0)
                                                            <span class="bg-danger text-warning ml-2">Late</span>
                                                        @else
                                                            <span class="bg-success text success">On time</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('refreshAttendance').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Show the loading overlay
            document.getElementById('loadingOverlay').style.display = 'flex';

            // Refresh the page after a short delay to ensure the loading overlay is visible
            setTimeout(function() {
                // Reload the page without any query parameters
                // location.reload();
                // window.location.href = window.location.origin;
                window.location.href = window.location.origin + '/admin/attendance';

            }, 500); // 0.5 second delay
        });
    </script>
@endsection
