/**
 * Created by tkagnus on 19/03/2017.
 */
// jQuery Plugin Boilerplate
// remember to change every instance of "ajaxForm" to the name of your plugin!
(function($) {
//    http://bootstrap-notify.remabledesigns.com/
    // here we go!
    $.ajaxForm = function(element, options) {
        var defaults = {
        };
        var plugin = this;
        plugin.settings = {};

        var $element = $(element), // reference to the jQuery version of DOM element
            element = element;    // reference to the actual DOM element
        plugin.init = function() {
            plugin.settings = $.extend({}, defaults, options);

            plugin.form = $element;

            plugin.form.submit(function(e){
                submitHandler();
                return false;
            });

        };

        var submitHandler = function(){
            $.ajax({
                url: plugin.form.attr('action'),
                method: plugin.form.attr('method'),
                data: plugin.form.serialize(),
                dataType: 'json',
                success: function(r,status,x){
                    // location.reload();
                    // console.log(r);
                },
                error: function(r,status,z){
                    //todo
                    formErrors($element,r.responseJSON);
                }
            });
        };

        plugin.init();

    }

    // add the plugin to the jQuery.fn object
    $.fn.ajaxForm = function(options) {
        return this.each(function() {
            // if plugin has not already been attached to the element
            if (undefined == $(this).data('ajaxForm')) {
                var plugin = new $.ajaxForm(this, options);
                $(this).data('ajaxForm', plugin);
            }
        });
    }

})(jQuery);

