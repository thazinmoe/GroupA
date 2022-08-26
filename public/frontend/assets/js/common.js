$('document').ready(function () {
    $('.tabs-nav a').click(function () {
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');

        let currentTab = $(this).attr('href');
        $('.tabs-texts').hide();
        $(currentTab).fadeIn();
        return false;
    });
});