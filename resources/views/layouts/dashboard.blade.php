@extends('layouts.app')

@section('content')
    @include('layouts.sections._header')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sections._sidebar')
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                     
                        <?php $segments = ''; ?>
                        @foreach(Request::segments() as $segment)
                            <?php $segments .= '/'.$segment; ?>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ $segments }}">{{$segment}}</a>
                            </li>
                        @endforeach
                    </ol>
                </nav>
                @yield('page-content')
                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2023</span>
                    
                </footer>
            </main>

        </div>
    </div>
@endsection
