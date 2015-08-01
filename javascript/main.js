$(function()
    {
        setLeftSpacerHeight();
        searchKeyWords();

        cartActions();

        $( document ).tooltip();

        $('body').on('click', '#newsLetter',addNewsletter);
        $('body').on('change', '.search-by-maker', searchByMaker);
        $('body').on('click', '.add-to-cart', addToCart);

        $('.main-slider').slick({
            autoplay: true,
//            prevArrow : '<div class="grid_1"><button type="button" class="slick-prev"><</button></div>',
//            nextArrow : '<div class="grid_1"><button type="button" class="slick-next">></button></div>',
            arrows: false,
//            appendArrows: $('.append-arrows'),
            appendDots: $('.append-dots'),
            dots: true,
            pauseOnDotsHover: true
//            adaptiveHeight: true
            });

    }

);

function cartActions()
{
    updateQuantity();
    removeItem();
}

function isCharacterNeeded(str, char)
{
    var lastChar = str.toString().slice(-1);
    if (lastChar != char)
    {
        return true;
    }

    return false;
}

function searchByMaker()
{
    var caller = $(this);
    if (caller.attr('data-url').length)
    {
        var url = caller.attr('data-url');
        var lastChar = isCharacterNeeded(url, '/') ? '/' : '';
        $(location).attr('href',url + lastChar + caller.val().toString().replace(' ', '_'));

    }
}

function setLeftSpacerHeight()
{

    var leftMenu = $('#left_menu');
    var mainContentContent = $('#main_content_content');

    if (mainContentContent.height() > leftMenu.height())
    {
        leftMenu.height(mainContentContent.height());
    }

}

function searchKeyWords() {

    var keywords;
    $('#search-keywords').on('focus',
        function () {
            keywords = $(this).val();
        }
    );

    if (keywords != undefined && keywords.toString().length == 0)
    {
        return false;
    }

    $('#search-keywords').on('blur', function () {
            var caller = $(this);

            if (keywords != caller.val())
            {
                $('.progressbar').show();
                triggerSearch(caller.val());

            }
        }
    );

    $("#search-keywords").enterKey(function () {
        var caller = $(this);

        if (keywords != caller.val())
        {
            $('.progressbar').show();
            triggerSearch(caller.val());
        }
    })
}

function triggerSearch(param)
{
    $(location).attr('href','/cauta/' + param);
}

function addNewsletter()
{
    var email = $('#newsletterEmail');
    var validateUrl = email.attr('data-validate-email');
    var newsletterError = $('#newsletterError');
    newsletterError.html('').addClass('hidden').removeClass('redText');

    if (email.val().toString().length != 0)
    {
        postData = {email: email.val()};
        ajaxPost(
            validateUrl,
            postData,
            function(resp){
                newsletterError.removeClass('hidden').html('').html(resp);

                setTimeout(function(){
                    newsletterError.addClass('hidden');
                }, 3000);

            },
            function(resp){

                newsletterError.html(resp.responseText);
                newsletterError.removeClass('hidden').addClass('redText');

            }
        );
    }
}

function addToCart()
{
    var caller = $(this);
    var addUrl = caller.attr('data-add-url');

    if ( addUrl != 'undefined')
    {
        ajaxGet(
            addUrl,
            function(resp){
                //OK
                $('#' + resp.id).text('In cos (' + resp.prdCount + ')');
//                alert(resp.message);
            },
            function(){
                //error
            }
        );
    }
}

function ajaxGet(url, doneFn, failFn)
{
    var request = $.ajax({
        url: url,
        type: "GET",
        dataType: "json"
    });

    request.done(function(resp) {
        doneFn(resp);
    });

    request.fail(function(resp) {
        failFn(resp);
    });
}

function ajaxPost(url, data, doneFn, failFn)
{
    var menuId = $("ul.nav").first().attr("id");
    var request = $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: "json"
    });

    request.done(function(resp) {
        doneFn(resp);
    });

    request.fail(function(resp) {
        failFn(resp);
    });
}

function updateQuantity()
{
    var oldQuantity;
    $('.update-quantity').on('focus',
        function () {
            quantity = $(this).val();
        }
    );

    $('.update-quantity').on('blur',
        function () {
            var caller = $(this);
            var newQuantity = caller.val()

            if (newQuantity != oldQuantity)
            {
                var updateUrl = caller.attr('data-update-quantity');

                if ( updateUrl != 'undefined')
                {
                    postData = {id: caller.attr('id'), qty: newQuantity, id_page: caller.attr('id_page')};
                    ajaxPost(
                        updateUrl,
                        postData,
                        function(resp){
                            $.fn.yiiGridView.update("cosul_meu", {data:{"id_page":resp.id_page}});
                        },
                        function(){
                            //error
                        }
                    );
                }
            }
        }
    );
}

function removeItem()
{
    $('.remove_item').on('click',
        function()
        {
            var caller = $(this);
            var confirmMessage = caller.attr('data-confirm-message');

            if ((caller.attr('data-remove-item') == undefined) || ( confirmMessage == undefined))
            {
                return false;
            }

            var confirmDialog = $("#dialog-confirm");
            var confirmText = "Renuntati la " + confirmMessage+"?";
            confirmDialog.attr('title', caller.attr('data-confirm-message')).text(confirmText);

            confirmDialog.dialog({
                resizable: true,
                modal: true,
                buttons: {
                    "Da": function() {
                        canRemoveItem(caller);
                        $( this ).dialog( "close" );
                    },
                    "Nu": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });


        }
    );
}

function canRemoveItem(caller)
{
    postData = {id: caller.attr('id'), id_page: caller.attr('id_page')};
    ajaxPost(
        caller.attr('data-remove-item'),
        postData,
        function(resp){
            $.fn.yiiGridView.update("cosul_meu", {data:{"id_page":resp.id_page}});
        },
        function(){
            //error
        }
    );
}

$.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        })
    })
}