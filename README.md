###Setting Up Project Laravel v10.*
````
1. Clone From Github
    url: git clone https://github.com/pinchai/hr34.git

2. Install Vendor by using composer
    cmd: composer install --ignore-platform-reqs
    
    cmd: cp .env.example .env
    
    cmd: php artisan key:generate

3. Connect Project to database (.env)

4. Migrate Database
    cmd: php artisan migrate:fresh --seed

5. Have fun
    cmd: php artisan serve

````




###Config Master Layout
````
1. parent page
<title>@yield('title')</title>
@yield('content')

2. child page
@extends('front.layout.master')
@section('title')
About
@endsection
````

####Active menu
````
#nested menu
request()->is('companies/*')

#single menu
{{ url()->current() == url('/') ? 'active' : '' }}
````

###Config Login Page 📌
_Protect route_
````
//Admin block
Route::middleware('auth')->group(function () {
    //protect rout block
}
````

_Login Route_
````
//login
Route::get('/login', 'App\Http\Controllers\Admin\LoginController@index')->name('login');
Route::post('/do_login', 'App\Http\Controllers\Admin\LoginController@do_login')->name('do_login');
Route::get('/logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('logout');

````
