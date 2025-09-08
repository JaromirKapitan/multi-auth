import Sortable from 'sortablejs';

let menuData = [];

$(function(){
    let $menu = $('#menu');

    // $('body').on('mouseover mouseout', '.web-map-container li[data-id]', function(evt){
    //     $('.web-map-container li[data-id]').removeClass('bg-primary-subtle');
    //
    //     if(evt.type === 'mouseover'){
    //         $(this).addClass('bg-primary-subtle');
    //     }
    // });

    new Sortable(document.getElementById('web_pages'), {
        group: {
            name: 'shared',
            pull: 'clone',
            put: false // Do not allow items to be put into this list
        },
        handle: '.handle',
        animation: 150,
        sort: false, // To disable sorting: set sort to false
        onEnd: (evt) => {
            let $el = $(evt.item);

            if($el.parents('#menu').length === 0) return;

            $el.append($('#empty-list').html())

            new Sortable($el.find('ul')[0], {
                group: 'shared',
                animation: 150,
            });

            checkList();
        }
    });

    $menu.find('ul').each(function(){
        new Sortable(this, {
            group: 'shared',
            handle: '.handle',
            animation: 150,
            onEnd: () => {
                checkList();
            }
        });
    })


    $menu.on('click', '.item-remove', function(evt){
        $(this).parents('li').remove();
        checkList();
    })

    $('#save-menu').click(function(evt){
        menuData = [];
        getListData($menu.find('>ul>li'));
        console.log(menuData); // todo: TMP

        // $.post( "ajax/test.html", function( response ) {
        //     console.log(response); // todo: TMP
        // });
    })
    checkList();
})

function checkList(){
    // $('#menu .item-add').remove();

    $('#menu ul').filter(function() {
        // Zisťujeme, či tento <ul> má presne jednu priamu položku <li>
        return $(this).children('li').length === 0;
    }).each(function() {
        $(this).append($('#empty-list ul>li').clone())
    });
}

function getListData($list){
    $list.each(function(){
        let $subList = $(this).find('ul>li:not(.empty-list)');
        if($subList.length > 0){
            getListData($subList);
        }

        let itemData = {
            id: $(this).data('id'),
            web_page_id: $(this).data('web-page-id'),
            web_menu_id: $(this).parents('li').data('id'),
        }

        if(itemData.id === undefined && itemData.web_page_id === undefined) return;

        console.log(itemData); // todo: TMP
        menuData.push(itemData)
    })

}
