@extends('layouts.master')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf

    @method('PUT')
    
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis:</strong>
                    <select class="form-control" name="nis">
                        @foreach($absens as $absen)
                        <option value="{{$absen->nis}}" @if($absen->absen == $absen->absen)selected @endif>{{$absen->nis}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$student->nama}}">
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rombel:</strong>
                        <select class="form-control" name="rombel">
                        @foreach($rombels as $rombel)
                        <option value="{{$rombel->nama_rombel}}" @if($student->rombel == $rombel->rombel)selected @endif>{{$rombel->nama_rombel}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon:</strong>
                        <select class="form-control" name="rayon">
                        @foreach($rayons as $rayon)
                        <option value="{{$rayon->nama_rayon}}" @if($student->rayon == $rayon->rayon)selected @endif>{{$rayon->nama_rayon}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{$student->username}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="password" class="form-control" placeholder="Password" value="{{$student->password}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
     
</form>
@endsection