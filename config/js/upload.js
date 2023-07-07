
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;

        //seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = (minutes > 0 ? minutes + ":" : "") + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function() {
    let timer = 5;
    display = document.querySelector('#time');
    startTimer(timer, display);
}
