<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

<body>
    <div class='container'>
        <main class="main_dashboard" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="dashboard">
                <img class="logo_pref" src="{{asset('assets/img/logoPref.png')}}" alt="">
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
