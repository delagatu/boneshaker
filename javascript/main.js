$(function()
    {
        setLeftSpacerHeight();
    }
)

function setLeftSpacerHeight()
{
    var leftMenuHeight = $('#left_menu').height();
    $('#left_menu_spacer').height(leftMenuHeight + 10);
    $('#left_menu_spacer').show();
}