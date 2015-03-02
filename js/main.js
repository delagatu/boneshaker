$(function()
    {
        setLeftSpacerHeight();
        searchKeyWords();
        updateQuantity();

//        $( document ).tooltip();

        $('body').on('click', '#newsLetter',addNewsletter);
        $('body').on('change', '.search-by-maker', searchByMaker);
        $('body').on('click', '.add-to-cart', addToCart);
    }

);

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

    $('#search-keywords').on('blur', function () {
            var caller = $(this);

            if (keywords != caller.val())
            {
                $('.progressbar').show();
                $('#generalSearchForm').trigger('submit');

            }
        }
    );
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
                alert(resp);
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
            alert(quantity + ' - ' + newQuantity);

            if (newQuantity != oldQuantity)
            {

            }
        }
    );
}