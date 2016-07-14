jQuery(document).ready(function () {
    jQuery('#nmclFormMain').submit(ajaxSubmit);

});

function ajaxSubmit() {
    var formFields = jQuery(this).serialize();
    //alert(formFields);

    jQuery.ajax({
        type: "POST",
        url: commonjs.ajaxurl,
        data: {
            action: 'nmclLifePathNumber',
            vars: formFields
        },
        success: function (result) {
            //alert(result);
            jQuery("#nmcl-return").html(result);
        }
    });

    return false;
}
