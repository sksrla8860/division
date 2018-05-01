CKEDITOR.plugins.add(
    'zuploader',
    {
        icons: 'zuploader',
        init: function (editor) {
            editor.addCommand(
                'zuploaderCommand',
                new CKEDITOR.command(
                    editor,
                    {alert("eee");
                        exec: function (editor) {
                            //var editor_type = editor.name === 'comment' ? 'comment' : '';
                            var action_url = '/admin/upload_file';
                            $('body').append('<div id="image_uploader_container" style="display: none"></div>');
                            var image_uploader = new qq.FileUploader(
                                {
                                    is_image: true,
                                    element: document.getElementById('image_uploader_container'),
                                    action: action_url,
                                    allowedExtensions: [
                                        'gif',
                                        'jpg',
                                        'png'
                                    ],
                                    maxConnections: 3,
                                    onComplete: function (id, filename, json) {
                                        //alert(json.success);
                                        if (json.success == true) {
                                            $('#wysiwyg_files').val($('#wysiwyg_files').val() + base64_encode(rawurlencode(filename)) + ':' + json.real_file_name + '|');
                                            var img = CKEDITOR.dom.element.createFromHtml('<p><img src="' + json.base_url +'/'+ json.real_file_name + '"></p>');
                                            //CKEDITOR.instances.contents1.insertElement(img);
                                            CKEDITOR.instances[editor.name].insertElement(img);
                                        }
                                        $('#image_uploader_container').find('.qq-upload-list').hide();
                                    },
                                    messages: {
                                        //typeError: lang['upload_file_error_extension']+"\n§extensions§",
                                        sizeError: "§file§ is too large, maximum file size is §sizeLimit§.",
                                        minSizeError: "§file§ is too small, minimum file size is §minSizeLimit§.",
                                        emptyError: "§file§ is empty, please select files again without it." //onLeave: lang['upload_file_being']
                                    },
                                    debug: false
                                }
                            );

                            var $uploader = $('#image_uploader_container');
                            $uploader.hide();
                            $uploader.find('input[type="file"]').click();
                        }
                    }
                )
            );

            editor.ui.addButton(
                'zuploader',
                {
                    label: 'ZzanLAB Uploader',
                    command: 'zuploaderCommand',
                    toolbar: 'zuploader'
                }
            );
        }
    }
);