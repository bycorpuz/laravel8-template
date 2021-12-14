function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh);
}
function display_ct() {
    var x = new Date();
    document.getElementById('ct').innerHTML = x;
    display_c();
}

function display_dtr_timer(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_dtr_time()',refresh);
}
function display_dtr_time() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    hours=hours.toString().length==1? 0+hours.toString() : hours;

    var minutes=x.getMinutes().toString()
    minutes=minutes.length==1 ? 0+minutes : minutes;

    var seconds=x.getSeconds().toString()
    seconds=seconds.length==1 ? 0+seconds : seconds;

    x1 = hours + ":" +  minutes + ":" +  seconds + " " + ampm;
    document.getElementById('dtr_time').innerHTML = x1;

    display_dtr_timer();
}