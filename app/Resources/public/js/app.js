var $ = require('jquery');
require('bootstrap-sass');




//Show or hide film specific inputs based on type select
jQuery(document).ready(function() {

    if($('#article_type').length > 0) {
        hideOrShowFilmInputs($('#article_type').val());
        $('#article_type').on('change', function(){
            hideOrShowFilmInputs($(this).val());
        });
    }
});


function hideOrShowFilmInputs(value) {

    if(value == 1) {
        if(!$('.hide-film-inputs').hasClass('hidden')) {
            $('.hide-film-inputs').addClass('hidden');
        }
    } else {
        $('.hide-film-inputs').removeClass('hidden');
    }
}
