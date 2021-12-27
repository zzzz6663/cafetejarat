require('./bootstrap');






$(document).ready(function() {
    if (jQuery) {
        // jQuery is loaded
        // $('#ostan').on('change', function(e) {
        //     var ele = $(this)
        //     var str = { 'ostan': ele.val() }
        //     var res = lara_ajax('/get_shahr/' + ele.val(), str)
        //     $('#shahr').html(res.body)
        // });
    } else {
        // jQuery is not loaded
        // alert("Doesn't Work");
    }
});