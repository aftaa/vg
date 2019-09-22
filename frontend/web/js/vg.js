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
    // index page blocks
    let animateEnabled = true;
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

    productChildCategories();

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
})