@extends('layouts.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rombel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rombels.create') }}"><i class="fas fa-plus"></i>Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rombels as $rombel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rombel->nama_rombel }}</td>
            <td>
                <form action="{{ route('rombels.destroy',$rombel->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('rombels.edit',$rombel->id) }}">
                    <i class="fas fa-fw fa-pen"></i>Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-fw fa-trash"></i>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $rombels->links() !!}
        
@endsection