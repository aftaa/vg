if (false) {

    function lockScreen() {

        $('input,select,textarea,button').css({disabled: true});
        $('a').prop('href', '#');
        $('*').css({cursor: 'wait'});
        $('div.wrap,footer').fadeOut('slow');
    }

    $('form').submit(function () {
        lockScreen();
        return true;
    });

    $('a').click(function (e) {
        e.preventDefault();
        lockScreen();
        return true;
    });

    $(function () {
        $(document).load(function () {
            $('div.wrap,footer').fadeIn('fast');
        })
    });

}


$(function () {
    // index page blocks
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

    // index page sub-categories
    $('a.product-categories').click(function () {
        alert(this.href);
        return false;
    })

    // cookie agree
    let $cookie;
    if ($cookie = $('#cookie')) {
        setTimeout(function(){
            $cookie.fadeIn('slow');
        }, 500);
        $('#i-agree').on('click', function () {
            $(this).css({cursor: 'wait'});
            $.post('/site/i-agree', function(){
                setTimeout(function() {
                    $('#cookie').fadeOut('fast');
                }, 500);
            });
        });
    }
})