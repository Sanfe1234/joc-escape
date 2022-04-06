/*----------------------
Click Div
----------------------*/
ClickDiv = {
    init: function () {
        $(".debug-menu").click(function () {
            $(".debug-menu").toggleClass("open");
        });
    }
};


$(function () {
    ClickDiv.init();
    // your code goes here

});
