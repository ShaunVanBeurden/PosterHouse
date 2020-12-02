$('body')
    .on('click', '.btn-page-edit', function () {
        var paragraph = $(this).parent();
        var id = $(this).attr('id');

        $.getJSON("/pagesection/" + id, function (result) {

            var update = $('<input type="hidden" name="_method" value="PUT">');
            var csrf = $('<input type="hidden" name="_token" value="' + $('meta[name="_token"]').attr('content') + '">');
            var title = $('<input type="text" class="form-control" name="title">');
            var textarea = $('<textarea name="content" class="form-control" id="content" rows="10" cols="60"></textarea>');
            var label = $('<label>Achtergrondkleur</label>');
            var colorpicker = $('<input type="color" name="background_color" class="form-control" value="#eeeeee">');
            var button = $('<input type="submit" name="submit" value="Opslaan">');
            var form = $('<form method="POST" action="/pagesection/' + id + '"></form>');
            var div = $('<div id="editable-content"></div>');
            textarea.text(result.content);
            title.val(result.title);
            colorpicker.val(result.background_color);
            form.append(update);
            form.append(csrf);
            form.append(title);
            form.append(textarea);
            form.append(label);
            form.append(colorpicker);
            form.append(button);
            div.append(form);

            paragraph.html(div);

            textarea.trumbowyg({
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

        }).fail(function (data) {
            console.log("fail");
            console.log(data);
        })
    });


$(document).ready(function () {
    $('.page_section').each(function () {
        var pageSection = $(this);
        $(this).parents().each(function () {
            if ($(this).hasClass("page_section_parent")){
                $(this).css("background-color", pageSection.css("background-color"));
            }
        });
    });
});