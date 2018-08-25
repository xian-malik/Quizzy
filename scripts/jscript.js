jQuery(document).ready(function($){
    $('#button_quiz').click(function(e){
        e.preventDefault();
        $('.info-desc').hide();
        $('#QuizForm').show().find('.question--field:first-child').addClass('active');
    });
    $('#NextQueButton').click(function(e){
        e.preventDefault();
        var el = $('.question--field.active');
        if ( !el.next().is(':last-of-type') ){
            $('.question--field.active').removeClass('active').next().addClass('active');
        } else {
            if ( !el.is(':last-of-type') ){
                $('.question--field.active').removeClass('active').next().addClass('active'); }
            $(this).css('visibility', 'hidden');
        }
    });
});
