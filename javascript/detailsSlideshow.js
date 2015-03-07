$(
    function(){

        $(".gallery").colorbox({rel:'gallery', current: '{current} din {total}'});
        $(".gallery_main").colorbox({rel:'gallery_main', current: '{current}'});
        $('.gallery').on('click',
            function()
            {
                var primary_photo = $('#primary_photo');
                var caller = $(this);
                primary_photo.attr('href', caller.attr('href'));
                primary_photo.attr('src', caller.attr('data-medium-photo'));
                $('.gallery_main').attr('href', caller.attr('data-big-photo'));
            }
        );
    }
);