@extends('layouts.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Kedatangan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('absens.create') }}"><i class="fas fa-plus"></i> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Jam Kedatangan</th>
            <th>Jam Kepulangan</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($absens as $absen)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $absen->nis }}</td>
            <td>{{ $absen->jam_kedatangan }}</td>
            <td>{{ $absen->jam_kepulangan }}</td>
            <td>{{ $absen->keterangan }}</td>
            <td>
                <form action="{{ route('absens.destroy',$absen->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('absens.edit',$absen->id) }}">
                    <i class="fas fa-fw fa-pen"></i> Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-fw fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $absens->links() !!}
        
@endsection