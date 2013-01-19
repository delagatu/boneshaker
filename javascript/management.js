$(
    function(){
        confirmDeleteMaker();
        setLeftSpacerHeight();
    }
);

function confirmDeleteMaker()
{
    $('.deleteMaker').click(
        function()
        {
            if (!confirm('Sigur stergeti producatorul selectat?'))
            {
                return false;
            } else {
                return true;
            }
        }
    );
}

function setLeftSpacerHeight()
{
    var leftMenuHeight = $('#left_menu').height();
    $('#left_menu_spacer').height(leftMenuHeight + 10);
    $('#left_menu_spacer').show();
}