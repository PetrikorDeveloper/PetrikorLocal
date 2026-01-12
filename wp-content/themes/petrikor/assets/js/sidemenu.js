/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });
    
    $('.search-button svg').on('click', function () {
        $(this).parents('.search-button').toggleClass('open');
        $(this).parents('.search-button').find('.search-field').focus();

    });
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
        $('html').removeClass('menu-open');
        $('body').removeClass('menu-open');
    });

    $('#sidebarCollapse').on('click', function (e) {
        e.preventDefault();
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('html').addClass('menu-open');
        $('body').addClass('menu-open');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    $('#sidebar a').on('click', function(){
        $('.overlay').click();
    });
});
;