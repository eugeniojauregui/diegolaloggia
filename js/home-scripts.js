jQuery(document).ready(function ($) {
    $(".testimonials-slider").lightSlider({
        item: 1,
        autoWidth: false,
        slideMargin: 0,
        mode: "slide",
        controls: true,
        pager: true,
        prevHtml:"<",
        nextHtml:">"
    });
    $('.hamb').click(function () {
        $('.collapsed-nav').slideToggle();
    });
});
jQuery(document).ready(function ($) {
    $(window).load(function () {
        //console.log(distance);
        $("a[rel='m_PageScroll2id']").mPageScroll2id({
            offset: '150',
            autoScrollSpeed: true,
            scrollEasing: "easeInOutExpo",
            scrollingEasing: "easeInOutCirc"
        });
        // var sticky = $('.site-header'),
        //     scroll = $(window).scrollTop();
        // if (scroll > 0) {
        //     sticky.addClass('fixed');
        // } else {
        //     sticky.removeClass('fixed');
        // }
    });
    $(window).scroll(function () {
        // var sticky = $('.site-header'),
        //     scroll = $(window).scrollTop();

        // if (scroll > 0) {
        //     sticky.addClass('fixed');
        // } else {
        //     sticky.removeClass('fixed');
        // }
    });
});