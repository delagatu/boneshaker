$(
    function () {
        addMissingPhoto();
        $(".gallery_edit").colorbox({rel:'gallery_edit', current:''});
        togglePhotos();
        deletePhoto();

    }
);

function togglePhotos() {

    $('#show-photos').on('click', function () {

            var displayPhotos = $('#display-photos');
            var caller = $(this);
            displayPhotos.toggle();

            var visible = displayPhotos.is(":visible");

            if (visible) {
                caller.html(caller.attr('data-up'));
            } else {
                caller.html(caller.attr('data-down'));
            }
        }
    );
}

function deletePhoto()
{
    $('#display-photos').on('click', '.delete-photo',
        function () {
            var caller = $(this);

            if (confirm('Sigur stergi poza?'))
            {
                ajaxGet(
                    caller.attr('data-delete-photo'),
                    function (resp){
                        $('#show-photos').trigger('click');
                        $('#display-photos').html(resp).show();
                        alert('Poza s-a sters cu succes.');
                    },
                    function (resp){}
                );
            }

        }
    )
}

function addMissingPhoto() {
    $('#display-photos').on('click', '.add-missing-photo',
        function () {
            var caller = $(this);
            var dialog = $("#dialog");

            dialog.append($("<iframe />").attr("src", caller.attr('data-add-photo-url')).attr('width', '400'));
            openMissingPhotoModal(dialog, caller.attr('data-all-photo-url'));

        }
    )
}

function openMissingPhotoModal(caller, allPhotoUrl) {
    caller.dialog({
        autoOpen:false,
        closeOnEscape:false,
        width:500,
//        height: 400,
        modal:true,
        title:'Poza noua',
        buttons:{
            "Inchide":function () {
                caller.dialog("close");
            }
        },
        open:function (event, ui) {
//            $('.addBicicleDetailDropDown').chosen();
        },
        close:function (event, ui) {
            caller.html('');
            $('#show-photos').trigger('click');
            ajaxGet(
                allPhotoUrl,
                function (resp) {
                    $('#display-photos').html(resp).show();
                    $('#show-photos').on('click', togglePhotos);
                },
                function (resp) {

                }
            )
        }
    });

    caller.dialog('open');
}
