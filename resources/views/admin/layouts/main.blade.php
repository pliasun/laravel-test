<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }} | Main view</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">

    <link href="{{ mix('/admins/css/app.css') }}" rel="stylesheet">

</head>

<body class="pace-done">

<div id="wrapper">
    @include('admin.parts.sidenav')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom m-t-n-md">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary mt-3 ml-2" href="#"><i
                            class="fas fa-bars"></i> </a>
                    {{-- <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Поиск..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form> --}}
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('admin.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </nav>
        </div>
        <div class="ibox">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {!! session('error') !!}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-danger">
                        @foreach ($errors->all() as $error)
                            <li class="list-danger__item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
        <div class="footer">
            {{-- <div class="pull-right">
                10TB of <strong>250TB</strong> Free.
            </div> --}}
            <div>
                <strong>Copyright </strong>&copy; 2019-{{ date('Y') }}
            </div>
        </div>

    </div>
</div>

<style>
    .btn.btn-delete {
        color: red;
        padding: 0;
    }

    th.buttons__ {
        width: 120px;
    }

    td.buttons__ {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>

<script src="{{ mix('/admins/js/app.js') }}" defer></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '.editor',
        width: 900,
        height: 300,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help'
    })
</script>
<style>
    .mce-notification {
        display: none !important;
    }
</style>
@yield('script')
</body>
</html>

