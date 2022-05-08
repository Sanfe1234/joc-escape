/*----------------------
Click Div
----------------------*/
DebugMenu = {
    init: function () {
        $(".debug-menu").click(function () {
            $(".debug-menu").toggleClass("open");
        });
    }
};


$(function () {
    DebugMenu.init();

});
