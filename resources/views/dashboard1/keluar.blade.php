@extends('layouts.appretience')
@section('content')

<style>
        body {
            background-color: black;
            color: black;

            font-family: 'Signika', sans-serif;

            background-size: cover;
            background-repeat: no-repeat;
        }

        #app {
            display: flex;
            flex-direction: column;
            align-items: center;

            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #time {
            font-size: 8rem;
            font-weight: 300;
            margin: 0;
        }

        #date {
            font-size: 2.5rem;
            margin: 0;
        }
</style>
<div class="card">
  <h5 class="card-header">Absensi</h5>
    <div class="card-body">
    <form action="{{ route('ubah-presensi') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <div id="app">
            <h1 id="time"></h1>
            <h1 id="date"></h1>
        </div>
        <br>
        <center>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a>
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Pulang</button>
                </a>
            </div>
        </center>
    </div>
    </form>
    </div>
</div>

<script>
    window.addEventListener('load', function () {

const weekDays = [
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday'
]

const months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
]

const dateTime = new Date()

const time = document.getElementById("time")
time.innerText = getTime(dateTime)

const date = document.getElementById("date")
date.innerText = getDate(dateTime)

setInterval(() => {
    const dateTime = new Date()
    time.innerText = getTime(dateTime)
    date.innerText = getDate(dateTime)
}, 1000)

function getTime(dateTime) {
    const hours = dateTime.getHours()
    const minutes = dateTime.getMinutes()
    return (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes)
}

function getDate(dateTime) {
    return weekDays[dateTime.getDay()] + ", " + months[dateTime.getMonth()] + " " + dateTime.getDate()
}
})
</script>
@endsection
