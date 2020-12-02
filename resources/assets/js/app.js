/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(function () {
    $(".single-select").select2();

    $('.datetimepicker').datetimepicker();


    $('textarea.rich').trumbowyg({
        btnsDef: {
            image: {
                dropdown: ['insertImage', 'upload', 'base64', 'noembed'],
                ico: 'insertImage'
            }
        },
        autogrow: true,
        btns: [
            'btnGrp-semantic',
            ['link'],
            ['image'],
            'btnGrp-justify',
            'btnGrp-lists',
            ['horizontalRule'],
            ['removeformat']
        ],
        plugins: {
            // Add imagur parameters to upload plugin
            upload: {
                serverPath: 'https://api.imgur.com/3/image',
                fileFieldName: 'image',
                headers: {
                    'Authorization': 'Client-ID 48b1c34b52ac74b'
                },
                urlPropertyName: 'data.link'
            }
        }
    });



    $('body')
        .on('click', '.btn-comment-edit', function () {
            var paragraph = $(this).parent();
            var text = paragraph.text().trim();
            var id = $(this).attr('id');

            var update = $('<input type="hidden" name="_method" value="PUT">');
            var csrf = $('<input type="hidden" name="_token" value="' + $('meta[name="_token"]').attr('content') + '">');
            var textarea = $('<textarea name="body" class="form-control rich" rows="10"></textarea>');
            textarea
            var button = $('<input type="submit" name="submit" value="Opslaan">');
            var form = $('<form method="POST" action="/comments/edit/' + id + '"></form>');
            var div = $('<div id="editable-comment"></div>');

            textarea.text(text);

            form.append(update);
            form.append(csrf);
            form.append(textarea);
            form.append(button);
            div.append(form);

            paragraph.html(div);
        });

    $(document).ready(function () {
        var lctx = document.getElementById("leftChart").getContext('2d');
        var leftChart = new Chart(lctx, {
            type: 'doughnut',
            data: {
                labels: ["deelnemers", "alles"],
                datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db"
                    ],
                    data: [45, 390]
                }]
            }
        });

        var mctx = document.getElementById("middleChart").getContext('2d');
        var middleChart = new Chart(mctx, {
            type: 'doughnut',
            data: {
                labels: ["deelnemers", "alles"],
                datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db"
                    ],
                    data: [150, 170]
                }]
            }
        });

        var rctx = document.getElementById("rightChart").getContext('2d');
        var rightChart = new Chart(rctx, {
            type: 'doughnut',
            data: {
                labels: ["verbeterd", "alles"],
                datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db"
                    ],
                    data: [200, 2]
                }]
            }
        });
    });


    // Agency Theme JavaScript


    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function () {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })
// });

    $(window).scroll(function () {
        var $el = $('.fixedElement');
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 500 && !isPositionFixed) {
            $('.fixedElement').css({'position': 'fixed', 'top': '0px'});
        }
        if ($(this).scrollTop() < 500 && isPositionFixed) {
            $('.fixedElement').css({'position': 'static', 'top': '0px'});
        }
    });
});
const initializeMap = function() {
    const map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: new google.maps.LatLng(52.266757977532166, 5.427386623988686),
        zoom: 8,
        disableDefaultUI: true,
        draggable: false,
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        disableDoubleClickZoom: true
    });
    var style = [
        {
            featureType: 'all',
            elementType: 'all',
            stylers: [
                {saturation: 48}
            ]
        },
        {
            featureType: "all",
            elementType: "labels",
            stylers: [
                {visibility: "off"}
            ]
        },
        {
            featureType: "road",
            elementType: "labels",
            stylers: [
                { visibility: "off" }
            ]
        },
        {
            featureType: "administrative",
            elementType: "labels",
            stylers: [
                { visibility: "off" }
            ]
        },{
            featureType: "poi",
            elementType: "labels",
            stylers: [
                { visibility: "off" }
            ]
        }

    ];
    var styledMapType = new google.maps.StyledMapType(style, {
        map: map,
        name: 'Styled Map'
    });
    map.mapTypes.set('map-style', styledMapType);
    map.setMapTypeId('map-style');
    var layer_0 = new google.maps.FusionTablesLayer({
        query: {
            select: "col0",
            from: "1pKNx9zsAVDj5Rbvxf4x4nXDuTjUQDTnwA2UCOtdN",
            where: " col13 >= 1 and col13 <= 3"
        },
        map: map,
        styleId: 2,
        templateId: 2
    });
};
google.maps.event.addDomListener(window, 'load', initializeMap);

function showReply(id) {
    var x = document.getElementById(id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

