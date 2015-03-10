$(
    function(){
        invalidateMaker();
        invalidateSubProduct();
        setLeftSpacerHeight();
        deleteProduct();
        addNewBikeDescriptionElement();
        $('body').on('submit', '#addBicycleDetailForm',
            function()
            {
                return false;
            }
        );

        searchKeyWords();
        invalidate();
        $('body').on('click', '#add-category',
            function(){
                var addNewCategory = $('#addNewCategory');

                if (addNewCategory.hasClass('hidden'))
                {
                    addNewCategory.removeClass('hidden');
                } else {
                    addNewCategory.addClass('hidden');
                }

            });

        $('.description').htmlarea({
//            toolbar: ["bold", "italic", "underline", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "link", "unlink"]
            toolbar: ["bold"]
        });

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

function invalidateMaker()
{
    $('#listaProducatori').on('click','.invalidate-maker',
        function()
        {
            var caller = $(this);
            var id = caller.attr('data-maker-id');
            var url = caller.attr('data-url');
            var checked = caller.is(':checked');
            var valid;
            valid = (checked == true) ? 1 : 0;

            var postData = {makerId:id, valid:valid};

            ajaxPost(
                url,
                postData,
                function(resp){
                    $.fn.yiiGridView.update("listaProducatori");
                },
                function (resp){
                    $.fn.yiiGridView.update("listaProducatori");
                    alert(resp.responseText);
                }
            );
        }
    );
}

function invalidateSubProduct()
{
    $('#listaCategorii').on('click','.invalidate-sub-product',
        function()
        {
            var caller = $(this);
            var id = caller.attr('data-sub-product-id');
            var url = caller.attr('data-url');
            var checked = caller.is(':checked');
            var valid;
            valid = (checked == true) ? 1 : 0;

            var postData = {subProductId:id, valid:valid};

            ajaxPost(
                url,
                postData,
                function(resp){
                    $.fn.yiiGridView.update("listaCategorii");
                },
                function (resp){
                    $.fn.yiiGridView.update("listaCategorii");
                    alert(resp.responseText);
                }
            );
        }
    );
}

function invalidate()
{
    $('#gridList').on('click','.invalidate',
        function()
        {
            var caller = $(this);
            var id = caller.attr('data-id');
            var url = caller.attr('data-url');
            var checked = caller.is(':checked');
            var valid;
            valid = (checked == true) ? 1 : 0;

            var postData = {id:id, available:valid};

            ajaxPost(
                url,
                postData,
                function(resp){
                    $.fn.yiiGridView.update("gridList");
                },
                function (resp){
                    $.fn.yiiGridView.update("gridList");
                    alert(resp.responseText);
                }
            );
        }
    );
}

function setLeftSpacerHeight()
{
    var leftMenuHeight = $('#left_menu').height();
    $('#left_menu_spacer').height(leftMenuHeight + 10);
    $('#left_menu_spacer').show();
}

function deleteProduct() {
    $('#listaBiciclete').on('click', '.delete-product',
        function () {

            var caller = $(this);
            var url = caller.attr('data-delete-url');
            var id = caller.attr('data-delete-id');
            var checked = caller.is(':checked');

            var available;

            available = (checked == true) ? 1 : 0;

            var postData = {id:id, available: available};

            ajaxPost(
                url, postData,
                function (resp) {

                   $.fn.yiiGridView.update("listaBiciclete");

                },
                function (resp) {
                    alert(resp.message);
                    $.fn.yiiGridView.update("listaBiciclete");
                }
            );

        }

    );
}

function addNewBikeDescriptionElement()
{
    $('#addBicicleForm').on('change', '.addBicicleDropDown',
        function()
        {
            var caller = $(this);
            if (caller.val() == -1)
            {
                var url = caller.attr('data-add-url');
                var id = caller.attr('id');
                var title = caller.attr('data-title');
                var dialog = $('#addDetailsDialog');
                var dropDownId = caller.attr('id');

                ajaxGet(
                    url + '?id=' + id,
                    function(resp)
                    {
                        dialog.html('').html(resp);
                        openModal(dialog, title, url, dropDownId);
                    },
                    function(resp)
                    {
                        dialog.html('');
                        dialog.html(resp);
                        fancyAlert(dialog);
                    }
                );
            }
        }

    );
}

function openModal(caller, title, url, dropDownId)
{
    caller.dialog({
        autoOpen: false,
        width: 350,
        height: 400,
        modal: true,
        title: title,
        buttons: {
            "Adauga":
                function() {

                var form = $('#addBicycleDetailForm');

                var postData = form.serializeArray();
                postData.push({"name":"id","value":dropDownId});

                ajaxPost(
                    url,
                    postData,
                    function (resp){

                        modalResponse(caller, resp);
                    },
                    function(resp)
                    {
                        caller.html('');
                        caller.html(resp.responseText);
                    }
                );
            },
            "Inchide": function() {
                caller.dialog( "close" );
            }
        },
        open: function( event, ui ) {
            $('.addBicicleDetailDropDown').chosen();
        }
    });

    caller.dialog('open');
}

function modalResponse(caller, resp)
{
    if ((typeof resp.productAdded) == 'undefined')
    {
        productNotAdded(caller, resp);

    } else {
         productAdded(caller, resp);
    }

}

function productNotAdded(caller, resp)
{
    caller.html('');
    caller.html(resp);

    $('.addBicicleDetailDropDown').chosen();

    var dropDown = caller.find('select');
}

function productAdded(caller, resp)
{
    if ((typeof resp.id) != 'undefined')
    {
        var initialDropDown = $('#' + resp.id);

        if ((typeof resp.newValue) != 'undefined')
        {
            var option = '<option value="'+ resp.newValue.id +'" >'+ resp.newValue.name +'</option>';
            initialDropDown.prepend(option);
            initialDropDown.val(resp.newValue.id).trigger("liszt:updated");
        }

        caller.dialog("close");
    }
}

function fancyAlert(caller)
{
    caller.dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "OK": function() {
                $( this ).dialog( "close" );
            }
        }
    });

    caller.dialog('open');
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

function ajaxGet(url, doneFn, failFn)
{
    var menuId = $("ul.nav").first().attr("id");
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