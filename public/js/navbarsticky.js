$(document).ready(function () {
    var controller = new ScrollMagic.Controller();
    $(function () { // wait for document ready
        // build scene
        var scene = new ScrollMagic.Scene({triggerElement: "#pin2", triggerHook: 0}).setPin("#pin2").addTo(controller);
    });
});