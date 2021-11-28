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