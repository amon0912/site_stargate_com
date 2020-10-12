$(window).scroll(() => {
    var initscroll = $(window).scrollTop();
    // console.log(initscroll);
    var docH = $(document).height();
    // console.log(docH);

    var winH = $(window).height();
    // console.log(winH);

    var scroll = (initscroll / (docH - winH)) * 100;
    // console.log(scroll);

    if (scroll > 0) {
        $('#bar').css('display', 'none');
    } else {
        $('#bar').css('display', 'block');
    }
    setTimeout(() => {
        $('#bar').css('display', 'block');
    }, 1000);
});