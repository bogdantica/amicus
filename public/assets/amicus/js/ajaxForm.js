/**
 * Created by tkagnus on 19/03/2017.
 */
// jQuery Plugin Boilerplate
// remember to change every instance of "pluginName" to the name of your plugin!
(function($) {
//    http://bootstrap-notify.remabledesigns.com/
    // here we go!
    $.pluginName = function(element, options) {
        var defaults = {
            foo: 'bar',
            onFoo: function() {}
        };
        var plugin = this;
        plugin.settings = {};

        var $element = $(element), // reference to the jQuery version of DOM element
            element = element;    // reference to the actual DOM element
        plugin.init = function() {
            plugin.settings = $.extend({}, defaults, options);
            // to do
        };

        // public methods
        // these methods can be called like:
        // plugin.methodName(arg1, arg2, ... argn) from inside the plugin or
        // element.data('pluginName').publicMethod(arg1, arg2, ... argn) from outside
        // the plugin, where "element" is the element the plugin is attached to;

        // a public method. for demonstration purposes only - remove it!
        plugin.foo_public_method = function() {

            // code goes here

        };
        var foo_private_method = function() {

            // code goes here

        }

        // fire up the plugin!
        // call the "constructor" method
        plugin.init();

    }

    // add the plugin to the jQuery.fn object
    $.fn.pluginName = function(options) {
        return this.each(function() {
            // if plugin has not already been attached to the element
            if (undefined == $(this).data('pluginName')) {
                var plugin = new $.pluginName(this, options);
                $(this).data('pluginName', plugin);

            }

        });

    }

})(jQuery);

