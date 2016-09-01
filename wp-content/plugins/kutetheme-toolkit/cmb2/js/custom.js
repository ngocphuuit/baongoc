(function($){
    $('document').ready(function() {
        $(document).on('click','.kt_group_menu .arow',function(){
            $(this).closest('.kt_item_menu').toggleClass('show-submenu');
        })
    });
})(jQuery);