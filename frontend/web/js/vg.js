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
    $('.uc').on('hover',
        function () {
            $(this).animate({height: '300px'}, 'slow')
        },
        function () {
            $(this).animate({height: '100px'}, 'slow')
        }
    );
})