import './bootstrap';
import jQuery from 'jquery';
$ = window.jQuery = window.$ = jQuery;

import slug from 'slug'
window.slug = slug;

import SeoForm from './seo-form.js';

$(function (){
    window.seoForm = new SeoForm();

    $('.submit-form').click(function (e){
        e.preventDefault();

        let target = $(this).data('form-target');
        let $form = target !== undefined ? $(target) : $(this).siblings('form');

        let ask = $(this).data('ask');
        if(ask !== undefined && !confirm(ask))
            return false;

        $form.submit();
        return false;
    })
})
