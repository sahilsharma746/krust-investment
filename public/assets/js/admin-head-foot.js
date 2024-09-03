$(document).ready(function () {
    const url = window.location.href;
    const lastSegment = url.substring(url.lastIndexOf('/') + 1);
    $.each($('nav > .nav-menu > li'), function () {
        const href = $(this).find('a').attr('href');
        const parent = $('title').attr('parent');
        if (
            ('./' + lastSegment == href || `./${parent}.html` == href) &&
            !$(this).find('a').hasClass('active')
        ) {
            $(this).find('a').addClass('active');
            $(this).siblings().find('a').removeClass('active');
            console.log('left nav active');
            return;
        }
    }); //! ======================================================

    const siteTitle = $('title').text().slice(8); //!=============
    if (siteTitle) $('.top-header .page-title').text(siteTitle);
});
