(function ($) {
    'use strict';
    $(function () {
        var navbar = $('.navmenu');
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const page = urlParams.get('page') ?? "";

        $('.navbar-nav li a', navbar).each(function () {
            var $this = $(this);
            if (page === "" || page === "ubahprofil") {
                if ($this.attr('href').indexOf("dashboard-user.php") !== -1) {
                    $('#homeNav').addClass('active')
                }
            } else {
                if ($this.attr('href').indexOf(page) !== -1) {
                    $(this).last().addClass('active')
                }
            }
        })
    });
})(jQuery);