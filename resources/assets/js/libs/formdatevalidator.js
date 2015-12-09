module.exports = {

    formEL: null,
    dateEls: null,

    init: function (formEl, dateEls) {
        formDateValidator.formEl = formEl;
        formDateValidator.dateEls = dateEls;

        formDateValidator.formEl.addEventListener('submit', formDateValidator.validate, false);
    },

    isDateTypeSupported: function () {
        var el = document.createElement('input');
        el.setAttribute('type', 'date');
        return el.type === 'date';
    },

    validate: function (ev) {
        var i = 0, l = formDateValidator.dateEls.length;
        var els = formDateValidator.dateEls;
        var hasDateFormatError = false;

        if (formDateValidator.isDateTypeSupported()) {
            return true;
        }

        for (i; i < l; i++) {
            if (els[i].value.search(/(\d{4}-\d{2}-\d{2})/) === -1) {
                hasDateFormatError = true;
            }
        }

        if (hasDateFormatError) {
            swal({
                type: "warning",
                title: "Incorrect date format",
                text: "Please enter dates as YYYY-mm-dd",
                showConfirmButton: true
            });
            ev.preventDefault();
        }
    }
}