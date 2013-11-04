$(function()
    {
        setLeftSpacerHeight();
        searchKeyWords();

        $( document ).tooltip();

        $('body').on('click', '#newsLetter',addNewsletter);
    }

)

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