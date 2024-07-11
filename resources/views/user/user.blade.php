@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-family: Kantumruy Pro;">អ្នកប្រើប្រាស់</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item" style="font-family: Kantumruy Pro;"><a href="#">ទំព័រដើម</a></li>
                            <li class="breadcrumb-item active" style="font-family: Kantumruy Pro;">អ្នកប្រើប្រាស់</li>
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
                                   
                                    <button type="button" style="font-family: Kantumruy Pro; border-color: #0069d9; border-radius: 5px; padding:5px 5px;color:#0069d9">
                                        <i class="fas fa-plus-circle" style=" color: #0069d9;"></i>
                                        បន្ថៃម
                                    </button>
                                </a>
                          
                                <div id="loadingOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; justify-content: center; align-items: center;">
                                    <img src="{{ asset('assets/img/loading.gif') }}"></img>
                                </div>
                                
                                <a href="#">
                                    <button id="refreshButton" type="button" style="font-family: Kantumruy Pro; border-color: #931ab1; border-radius: 5px; padding:5px 5px;color:#931ab1">
                                        <i class="fas fa-sync-alt" style="color:#931ab1"></i>
                                        ទាញសារឡើងវិញ
                                    </button>
                                </a>
                        
                        
                                <div class="search-container d-flex float-right">
                                    <form class="d-flex"action="{{ route('search_users') }}" method="GET" >
                                        <input class="form-control me-2 mr-2" type="search" name="search" placeholder="ស្វែងរក" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit" >ស្វែងរក</button>
                                    </form>
                                </div>
                    
                      
                        </div>
                   
                            
                            
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">ល.រ</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">ឈ្មោះ</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">ភេទ</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">លេខទូរស័ព្ទ</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">តួនាទី</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">ស្ថានភាព</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">កាលបរិច្ឆេទបង្កើត</th>
                                            <th style="font-family: Kantumruy Pro; font-weight:400; font-size:15px; color:rgb(68, 66, 66)">សកម្មភាព</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($data as $item)
                                        <tr style="border-radius:5px;" >
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <span style="text-transform: capitalize">{{ $item->gender }}</span>
                                            </td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <span style="text-transform: capitalize; background-color: yellow; color: red; border-radius: 5px;">
                                                    {{ $item->role }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $item->status }}
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td style="display:flex">
                                                <a href="javascript:void(0);" class="main__table-btn main__table-btn--{{ $item->status == 'Blocked' ? 'banned' : 'approved' }}" data-user-id="{{ $item->id }}" data-status="{{ $item->status }}" onclick="toggleStatus(this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('index_update_user') }}?id={{ $item->id }}" class="main__table-btn main__table-btn--edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ url('/admin/index_confirm_delete') }}?id={{ $item->id }}" class="main__table-btn main__table-btn--delete open-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/>
                                                    </svg>
                                                </a>
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
@endsection

<script>
    function toggleStatus(button) {
        var userId = button.getAttribute('data-user-id');
        var currentStatus = button.getAttribute('data-status');
    
        var newStatus = currentStatus === 'Blocked' ? 'Approved' : 'Blocked';
    
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${newStatus.toLowerCase()} this user?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, ${newStatus.toLowerCase()} user!`
        }).then((result) => {
            if (result.isConfirmed) {
                updateStatus(userId, newStatus);
            }
        });
    }
    
    function updateStatus(userId, newStatus) {
        fetch('{{ route('update_status') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: userId, status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire(
                    `${newStatus}!`,
                    `The user has been ${newStatus.toLowerCase()}.`,
                    'success'
                ).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire(
                    'Error!',
                    'There was an error updating the user status.',
                    'error'
                );
            }
        })
        .catch(error => {
            Swal.fire(
                'Error!',
                'There was an error updating the user status.',
                'error'
            );
        });
    }
    </script>
     
