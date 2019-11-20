'use strict';

// index page sub-categories
function productChildCategories() {
    $('a.look-product-category').click(function () {
        let catId = this.dataset.categoyrId;
        $.get(this.href, function (html) {
            $('#product-category-' + catId).html(html).fadeIn('slow');
        });
        return false;
    });
}

$(function () {
    productChildCategories();

    // index top & new products
    $('#look-new-products a, #look-top-products a').on('click', function () {
        $('#index-top-products').toggle();
        $('#index-new-products').toggle();

        $(this.parentNode).slideUp('slow');
        $('#index-products-switcher > div:hidden').slideDown('slow');
        return false;
    });

    // index top & new companies
    $('#look-new-companies a, #look-top-companies a').on('click', function () {
        $('#index-top-companies').toggle();
        $('#index-new-companies').toggle();

        $(this.parentNode).slideUp('slow');
        $('#index-companies-switcher > div:hidden').slideDown('slow');
        return false;
    });

    // index page blocks under construction
    let animateEnabled = false;
    $('div.uc').on('mouseenter', function () {
        if (animateEnabled) {
            $(this).animate({'height': '300px'});
            $('p', this).show();
        }
    });
    $('div.uc').on('mouseout', function () {
        if (animateEnabled) {
            $(this).animate({'height': '100px'});
            $('p', this).hide();
        }
    });

    // cookie agree
    let $cookie;
    if ($cookie = $('#cookie')) {
        setTimeout(function () {
            $cookie.fadeIn('slow');
        }, 500);
        $('#i-agree').on('click', function () {
            $(this).css({cursor: 'wait'});
            $.post('/site/i-agree', function () {
                setTimeout(function () {
                    $('#cookie').fadeOut('fast');
                }, 500);
            });
        });
    }
});

// check thumb exists policy
// in russian: обратиться в полицию превьюшек, если нет оной
$(window).on('load', function () {
    $('.index-product-thumb img').each(function () {
        if (!this.width || !this.height) {
            this.src = '/img/no_product.jpg';
            let id = this.dataset.id;
            $.get('policy/no-product-thumb/' + id);
        }
    });

    $('.index-company-thumb img').each(function () {
        if (!this.width || !this.height) {
            this.src = '/img/no_logo.jpg';
            let id = this.dataset.id;
            $.get('policy/no-company-thumb/' + id);
        }
    });

    $('.category-product img').each(function () {
        if (!this.width || !this.height) {
            this.src = '/img/no_product.jpg';
            let id = this.dataset.id;
            $.get('policy/no-product-thumb/' + id);
        }
    });

    // TODO объеденить первую и последнюю функции
});


//blur unload
$(window).on('load', function() {
    $('div.container, footer').css('filter', 'blur(0px)');
    $('#unload').fadeOut('slow');
})