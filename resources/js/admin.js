import './bootstrap';
import jQuery from 'jquery';
$ = window.jQuery = window.$ = jQuery;

$(function (){
    $('.submit-form').click(function (e){
        e.preventDefault();

        let target = $(this).data('form-target');
        if(target !== undefined)
            $(target).submit();
        else
            $(this).siblings('form').submit();

        return false;
    })
})
