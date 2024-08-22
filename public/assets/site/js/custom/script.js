$(document).ready(function() {
    var lastScrollTop = 0;
    var navbarHeight = $('#top-navbar').outerHeight();

    $(window).scroll(function() {
        var st = $(this).scrollTop();

        if (st > lastScrollTop) {
            $('#top-navbar').css('top', '-60px'); // إخفاء القائمة العلوية عند التمرير للأسفل
            $('#main-fix').addClass('fixed-top').css('top', '0');
        } else {
            if (st <= navbarHeight) {
                $('#top-navbar').css('top', '0');
                $('#main-fix').removeClass('fixed-top').css('top', '');
            }
        }

        lastScrollTop = st;
    });
	  $('#menu-toggle').click(function() {
        $('#sidebar').toggleClass('active');
        $('#overlay').toggleClass('active');
    });

    $('#close-sidebar, #overlay').click(function() {
        $('#sidebar').removeClass('active');
        $('#overlay').removeClass('active');
    });

    $("#age-slide").slider({ id: "slider-age"});

// Without JQuery
//var slider = new Slider('#ex2', {});

});

 