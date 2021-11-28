@extends('layouts.appretience')
@section('content')

<body>
    <div class="row">
		<div class="container">
			<h2 class="text-center my-4">Validasi Kehadiran</h2>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p><center>{{ $message }}</center></p>
        </div>
    @else ($message = Session::get('warning'))
        <div class="alert alert-warning">
            <p><center>{{ $message }}</center></p>
        </div>
    @endif
    </body>
    <div class="content" style="padding-left:23rem;">
        <div class="col-6 text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-bordered" style="background-color: #fff;">
                    
                    @foreach ($dashboard1 as $presensi)
                    <tr>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                    </tr>
                    <tr>
                        <td>{{ $presensi->jammasuk }}
                        </td>
                        <td>{{ $presensi->jamkeluar }}
                        </td>
                        
                    </tr>
                    @endforeach
                    
                </table>
                </div><tr>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link"  :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <button class="btn btn-danger">
                                        <i class="fas fa-fw fa-sign-out-alt"></i>
                                 <span>{{ __('Log Out') }}</span></button>
                            </a>
                            </form>
                        </tr>
                
            </div>
        </div>
    </div>
@endsection