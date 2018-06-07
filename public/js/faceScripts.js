$(document).ready(function () {

    var c, currentScrollTop = 0,
        navbar = $('nav');

    $(window).scroll(function () {
        var a = $(window).scrollTop();
        var b = navbar.height();

        currentScrollTop = a;

        if (c < currentScrollTop && a > b + b) {
            navbar.addClass("scrollUp");
        } else if (c > currentScrollTop && !(a <= b)) {
            navbar.removeClass("scrollUp");
        }
        c = currentScrollTop;
    });
	new WOW().init();
	wow = new WOW({
		boxClass:     'wow',
		animateClass: 'animated',
        offset:       0,
        mobile:       false,
        live:         false
        })
     wow.init();
});

$(window).on('beforeunload', function(){
	$(window).scrollTop(0);
});