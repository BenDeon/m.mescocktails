(function($) {
    $.fn.infiniteScroll = function(options) {
        $(window).scroll(function() {
            if (($(window).scrollTop() > $(document).height() - $(window).height() - $('#footer').height() - 20) && ($(window).scrollTop() < $(document).height() - $(window).height() - $('#footer').height() + 20)) {
                $('#content').append(options.displayLoading);
            }
        });
    };
})(jQuery);
