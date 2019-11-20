@section('admin_breadcrumb')

<section class="content @yield('admin_page_class')">

    <div class="block-header">

        <div class="row">

            <div class="col-lg-7 col-md-6 col-sm-12">

                <h2>@yield('title_breadcrumb')

                <small class="text-muted">Welcome to {{ config('constant.APP_ADMIN_TITLE') }}</small>

                </h2>

            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">

              {!! make_breadcrumb_admin() !!}

                <!-- 

                <ul class="breadcrumb float-md-right">

                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Nexa</a></li>

                    <li class="breadcrumb-item active">{{ Route::currentRouteName()}}</li>

                </ul> -->

            </div>

        </div>

    </div>

    

@show