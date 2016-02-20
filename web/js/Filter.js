var Filter = (function () {
    return {
        init: function () {
            $('.selectpicker').selectpicker();
            $('.selectpicker').on('hidden.bs.select', function (e) {
                $(this).submit();
            });
        }
    }
})()

Filter.init()

$(document).on('pjax:end', function() {
    Filter.init()
});