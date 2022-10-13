@extends('layouts.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <div style="text-align:center;">
                <div class="pull-left">
                    <h2>Data Ketidakhadiran</h2>
                </div>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>Bukti</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($gambars as $bukti)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $bukti->keterangan }}</td>
            <td><img width="130px" src="{{ url('/data_file/'.$bukti->file) }}" alt=""></td>
            <td>
                <form action="{{ route('gambars.destroy',$bukti->id) }}" method="POST">
    
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-fw fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $gambars->links() !!}

@endsection