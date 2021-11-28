@extends('layouts.master')
@section('content')
<div class="card">
  <h5 class="card-header">Welcome</h5>
  <div class="card-body">
    <h5 class="card-title">Selamat datang di Website absen</h5>
    <p class="card-text">klick pada button ini untuk memulai</p>
    <a href="{{ route('students.index') }}" class="btn btn-primary">Ayo Mulai!</a>
  </div>
</div>
@endsection