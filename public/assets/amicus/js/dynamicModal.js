/**
 * Created by tkagnus on 19/03/2017.
 */
// jQuery Plugin Boilerplate
// remember to change every instance of "dynamicModal" to the name of your plugin!
(function ($) {
//    http://bootstrap-notify.remabledesigns.com/
    // here we go!
    $.dynamicModal = function (element, options) {
        var defaults = {
            url: false,
            form: false,
            method: 'POST',
            hookModal: function ($modal) {

            }
        };
        var plugin = this;
        plugin.settings = {};

        var $element = $(element), // reference to the jQuery version of DOM element
            element = element;    // reference to the actual DOM element
        plugin.init = function () {
            plugin.settings = $.extend({}, defaults, options);

            getUrl();
            hookAction();

        };

        var hookAction = function () {
            $element.click(function (e) {
                e.preventDefault();
                plugin.callModal();
                return false;
            });
        };

        var getUrl = function () {
            if (plugin.settings.url == false) {
                plugin.url = $element.data('url');
            } else {
                plugin.url = plugin.settings.url;
            }
        };

        plugin.showModal = function () {
            plugin.modal.modal('show');
        };

        plugin.saveModal = function($modal){
            plugin.modal = $modal;
            $('body').append($modal);

            if(plugin.settings.form){

                plugin.modal.find('form').ajaxForm();
            }

            plugin.settings.hookModal(plugin.modal);

        };

        plugin.callModal = function () {
            if (typeof  plugin.modal !== "undefined") {

                plugin.showModal();

            } else {
                $.ajax({
                    url: plugin.url,
                    method: plugin.settings.method,
                    data: {
                        id: $element.data('id'),
                        id2: $element.data('id2')
                    },
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': window.amicus.csrfToken},
                    success: function (r) {

                        plugin.saveModal($(r.modal));
                        plugin.showModal();
                    }
                });
            }
        };

        plugin.init();

    };

    // add the plugin to the jQuery.fn object
    $.fn.dynamicModal = function (options) {
        return this.each(function () {
            // if plugin has not already been attached to the element
            if (undefined == $(this).data('dynamicModal')) {
                var plugin = new $.dynamicModal(this, options);
                $(this).data('dynamicModal', plugin);
            }
        });
    }

})(jQuery);

