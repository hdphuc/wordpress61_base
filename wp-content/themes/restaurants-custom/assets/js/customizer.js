/*
 * Script for customizer controls.
 */
(function($, api) {
    // Editor control.
    $(window).ready(function() {
        /**
         * Event use editor tinyMCE
         */
        $('textarea.wp-editor-area').each(async function() {
            var $this = $(this),
                id = $this.attr('id'),
                $input = $('input[data-customize-setting-link="' + id + '"]'),
                editor = await tinyMCE.get(id),
                setChange,
                content;

            if (editor) {
                editor.on('change', function(e) {
                    editor.save();
                    content = editor.getContent();
                    clearTimeout(setChange);
                    setChange = setTimeout(function() {
                        $input.val(content).trigger('change');
                    }, 500);
                });
            }

            await $this.css('visibility', 'visible').on('keyup', function() {
                content = $this.val();
                clearTimeout(setChange);
                setChange = setTimeout(function() {
                    $input.val(content).trigger('change');
                }, 500);
            });
        });
    });
})(jQuery, wp.customize);