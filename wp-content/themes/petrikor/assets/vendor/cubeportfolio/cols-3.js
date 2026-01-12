(function ($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#js-grid-juicy-projects').cubeportfolio({
        filters: '#js-filters-juicy-projects',
        loadMore: '#_js-loadMore-juicy-projects',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 35,
        gapVertical: 30,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 1500,
                cols: 2
            }, {
                width: 1100,
                cols: 2
            }, {
                width: 800,
                cols: 2
            }, {
                width: 480,
                cols: 2
            }, {
                width: 320,
                cols: 1
            }],
        caption: 'zoom',
//        caption: 'overlayBottomReveal',
        displayType: 'sequentially',
        displayTypeSpeed: 80,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function (url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 30000
            })
                    .done(function (result) {
                        t.updateSinglePage(result);
                    })
                    .fail(function () {
                        t.updateSinglePage('AJAX Error! Please refresh the page!');
                    });
        },
    });

    $('#js-loadMore-juicy-projects').on('click', function (event) {
//        console.log('clicked');
        event.preventDefault();
        $('.cbp-l-loadMore-defaultText').hide();
        $('.cbp-l-loadMore-loadingText').show();
        var thisss = $(this).find('a');
        var page = thisss.data('page');
//        alert(page);
        var currentPage = window.location.href;
        var thisPage='';
        if (currentPage.trim() ==='https://petrikorsolutions.com/case-studies/'){
            thisPage='casestudy';
        }
        else{
            thisPage='portfolio';
        }
        console.log('CURRENT PAGE: ',currentPage);
        setTimeout(function() {
            $.ajax({
                type: 'GET',
                url: '?current='+thisPage+'&page_in_list=' + page,
                dataType: 'html',
                success: function (data) {
//                console.log(data);
                    AOS.refresh();

                    //$('.cbp-wrapper').append(data);
                    if (data == 0) {
                        $('#js-loadMore-juicy-projects').addClass('disabled');
                        $('.cbp-l-loadMore-defaultText').hide();
                        $('.cbp-l-loadMore-noMoreLoading').show();
                    } else {
                        $('.cbp-l-loadMore-defaultText').show();
                        jQuery("#js-grid-juicy-projects").cubeportfolio('appendItems', data);

                        thisss.data('page', parseInt(page) + 1);
                    }
                    $('#js-loadMore-juicy-projects').addClass('disabled');
                    $('.cbp-l-loadMore-noMoreLoading').show();
                    $('.cbp-l-loadMore-defaultText').hide();
                    //console.log($('#card'));
                }
            });
            $('.cbp-l-loadMore-loadingText').fadeOut(1500);
            $('#js-loadMore-juicy-projects').addClass('disabled');


        }, 2000);


    });
})(jQuery, window, document);
;