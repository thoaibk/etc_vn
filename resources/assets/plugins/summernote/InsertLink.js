/**
 *
 * copyright [year] [your Business Name and/or Your Name].
 * email: your@email.com
 * license: Your chosen license, or link to a license file.
 *
 */
(function (factory) {
    /* Global define */
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node/CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        factory(window.jQuery);
    }
}(function ($) {
    $.extend(true,$.summernote.lang, {
        'en-US': { /* US English(Default Language) */
            InsertLink: {
                exampleText: 'Chèn link bài viết',
                dialogTitle: 'Chèn link bài viết',
                okButton: 'Chèn link',

            }
        }
    });

    $.extend($.summernote.options, {
        InsertLink: {
            icon: '<i class="note-icon-link"/>',
            tooltip: 'Example Plugin Tooltip'
        },
        checked: true
    });
    $.extend($.summernote.plugins, {

        'InsertLink': function (context) {

            var self      = this,
                ui        = $.summernote.ui,
                $note     = context.layoutInfo.note,
                $editor   = context.layoutInfo.editor,
                $editable = context.layoutInfo.editable,
                $toolbar  = context.layoutInfo.toolbar,
                options   = context.options,
                lang      = options.langInfo;

            context.memo('button.InsertLink', function () {
                var button = ui.button({
                    contents: options.InsertLink.icon,
                    tooltip: lang.InsertLink.tooltip,
                    codeviewKeepButton: true,
                    click:function (e) {
                        context.invoke('InsertLink.show');
                    }
                });
                return button.render();
            });

            this.initialize = function() {
                var $container = options.dialogsInBody ? $(document.body) : $editor;
                var body = '<div class="form-group">' +
                        '<label for="note-dialog-link-txt-111" class="note-form-label">Text hiển thị</label>' +
                        '<input id="insertTextDisplay" class="form-control note-form-control note-input" type="text"/>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="note-dialog-link-txt-111" class="note-form-label">Tìm bài viết</label>' +
                        '<input id="note-dialog-link-txt-222" class="form-control note-form-control note-input searchTitle" type="text"/>' +
                    '</div>' +
                    '<div class="listPostSuggession"></div>' +
                    '<div class="form-group">' +
                        '<label class="note-form-label">Link</label>' +
                        '<input id="inputLinkPlugin" class="form-control note-form-control note-input" type="text"/>' +
                    '</div>'+
                    '<div class="custom-control custom-checkbox">'+
                    '<input type="checkbox" class="custom-control-input" id="checkNewTab"' + (options.checked ? ' checked' : '') + '/>' +
                        '<label for="checkNewTab" class="custom-control-label"> Mở trong Tab mới </label>'+
                    '</div>';
                var footer = '<button href="#" class="btn btn-primary note-examplePlugin-btn">' + lang.InsertLink.okButton + '</button>';

                this.$dialog = ui.dialog({
                    title: lang.InsertLink.dialogTitle,
                    body: body,
                    footer: footer
                }).render().appendTo($container);

            };

            this.destroy = function () {
                ui.hideDialog(this.$dialog);
                this.$dialog.remove();
            };
            this.bindEnterKey = function ($input, $btn) {
                $input.on('keypress', function (event) {
                    if (event.keyCode === 13) $btn.trigger('click');
                });
            };

            this.bindKeyUp = function ($input) {
                console.log('bindKeyUp');
            };

            this.bindLabels = function () {
                self.$dialog.find('.form-control:last').focus().select();
                self.$dialog.find('label').on('click', function () {
                    $(this).parent().find('.form-control:last').focus();
                });
            };
            this.show = function () {
                var $img = $($editable.data('target'));
                var linkInfo = context.invoke('editor.getLinkInfo');

                this.showexamplePluginDialog(linkInfo).then(function (editorInfo) {

                    context.invoke('editor.restoreRange');
                    context.invoke('editor.createLink', editorInfo);

                    ui.hideDialog(self.$dialog);
                    // $note.val(context.invoke('code'));
                    // $note.change();
                });
            };
            this.currentReqest = null;
            this.search = function (search) {

                if(search.length == 0){
                    return
                }

                var $listPostDiv = self.$dialog.find('.listPostSuggession');
                self.currentRequest = $.ajax({
                    url: '/api/post/search-link',
                    type: 'GET',
                    data: {search: search},
                    beforeSend : function()    {
                        if(self.currentRequest != null) {
                            self.currentRequest.abort();
                        }
                    },
                }).done(res => {
                    if(res.length > 0){
                        $listPostDiv.empty();
                        let $ul = $('<ul class="ul-none"></ul>');
                        for (var i in res){
                            $ul.append('<li class="link-suggess-item" data-link="'+ res[i].link +'">' + res[i].title + '</li>');
                        }
                        $listPostDiv.append($ul);
                    } else{
                        $listPostDiv.empty();
                    }

                }).fail(err => {

                })

            };
            this.showexamplePluginDialog = function(editorInfo) {

                return $.Deferred(function (deferred) {
                    var $editBtn = self.$dialog.find('.note-examplePlugin-btn');
                    var $textDisplay = self.$dialog.find('#insertTextDisplay');
                    var $inputSearchTitle = self.$dialog.find('.searchTitle');
                    var $listPostDiv = self.$dialog.find('.listPostSuggession');
                    var $inputLink = self.$dialog.find('#inputLinkPlugin');
                    var $checkNewTab = self.$dialog.find('#checkNewTab');
                    // fill text display and url given from editor
                    $textDisplay.val(editorInfo.text);
                    $inputSearchTitle.val(editorInfo.text);
                    $inputLink.val(editorInfo.url);

                    self.search(editorInfo.text);


                    var currentRequest = null;
                    $inputSearchTitle.keyup( function () {
                        var searchLink = $inputSearchTitle.val();
                        currentRequest = $.ajax({
                            url: '/api/post/search-link',
                            type: 'GET',
                            data: {search: searchLink},
                            beforeSend : function()    {
                                if(currentRequest != null) {
                                    currentRequest.abort();
                                }
                            },
                        }).done(res => {
                            if(res.length > 0){
                                $listPostDiv.empty();
                                let $ul = $('<ul class="ul-none"></ul>');
                                for (var i in res){
                                    $ul.append('<li class="link-suggess-item" data-link="'+ res[i].link +'">' + res[i].title + '</li>');
                                }
                                $listPostDiv.append($ul);
                            } else{
                                $listPostDiv.empty();
                            }

                        }).fail(err => {

                        })
                    });


                    $(document).on('click', '.link-suggess-item', function () {
                        $inputLink.val($(this).attr('data-link'));
                    });

                    ui.onDialogShown(self.$dialog, function () {
                        context.triggerEvent('dialog.shown');
                        $editBtn.click(function (e) {
                            e.preventDefault();
                            deferred.resolve({
                                range: editorInfo.range,
                                url: $inputLink.val(),
                                text: $textDisplay.val(),
                                isNewWindow: $checkNewTab.is(':checked'),
                                checkProtocol: false,
                            });
                        });
                        self.bindEnterKey($editBtn);
                        self.bindLabels();
                    });
                    ui.onDialogHidden(self.$dialog, function () {
                        $editBtn.off('click');
                        if (deferred.state() === 'pending') deferred.reject();
                    });
                    ui.showDialog(self.$dialog, function () {
                        console.log('showDialog', editorInfo);
                    })
                });
            };

        }
    })
}
));