$(document).ready(function () {
    const timeout = 1800000;  // 60000 ms = 1 minute
    var idleTimer = null;
    $('*').bind('visibilitychange mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
        clearTimeout(idleTimer);

        idleTimer = setTimeout(function () {
            document.getElementById('logout-form').submit();
        }, timeout);
    });
    $("body").trigger("mousemove");
});