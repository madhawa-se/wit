$(document).ready(function () {
    Drupal.behaviors.sidebarLeft();
});
//push BAS logo context to bottom
Drupal.behaviors.sidebarLeft = function (context) {
    if ($("#block-block-8").length > 0) {
        $("#block-block-8").detach().insertAfter('.staff-expert');
    }
};