$("[data-countdown]").each(function () {
    var n = $(this),
        s = $(this).data("countdown");
    n.countdown(s, function (n) {
        $(this).html(n.strftime('<div class="coming-box">%D <span>Days</span></div> <div class="coming-box">%H <span>Hrs</span></div> <div class="coming-box">%M <span>Mins</span></div> <div class="coming-box">%S <span>Sec</span></div> '))
    })
});
