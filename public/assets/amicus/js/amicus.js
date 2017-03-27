/**
 * Created by tkagnus on 15/03/2017.
 */

function formErrors($form, errors) {



    for (var errorKey in errors) {
        var array = errorKey.split('.');
        var inputSelector = '';
        if (array.length) {
           var arraySelector = '';
            for (arrayKey in array) {
                value = array[arrayKey];
                if (!isNumeric(value)) {
                    arraySelector += value;
                } else {
                    arraySelector += '[' + value + ']';
                }
            }
            inputSelector = arraySelector;

        }else{
            inputSelector = errorKey;
        }

        var inputErrors = errors[errorKey];

        for(var inputErrorKey in inputErrors ){
            var inputError = inputErrors[inputErrorKey];
            inputSelector = '[name="' + inputSelector + '"]';

            var $input = $form.find(inputSelector);

            if($input.prop('type') != 'text'){
                $input = $input.first(':checked');
            }

            var firstParent = $input.parent();
            if(firstParent.prop('nodeName') == "LABEL"){
                firstParent.parent().addClass('has-error');
                $('<p class="help-block m-b-0">' + inputError + '</p>').insertAfter(firstParent);

            }else{
                firstParent.addClass('has-error');
                firstParent.append('<p class="help-block m-b-0">' + inputError + '</p>');
            }
        }
    }

}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}