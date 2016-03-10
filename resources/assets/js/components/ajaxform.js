var AjaxForm = function(formEl, successCallback) {
    this.formEl = formEl;
    this.successCallback = successCallback || function(){};
    this.init();
}

AjaxForm.prototype.init = function() {
    this.formEl.addEventListener('submit', this.handleSubmit.bind(this), false);
}

AjaxForm.prototype.handleSubmit = function(ev) {
    ev.preventDefault();
    var fd = new window.FormData(this.formEl);
    var req = new window.XMLHttpRequest();
    var self = this;
    req.open('POST', this.formEl.getAttribute('action'), true);
    req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    req.onreadystatechange = function (ev) {
        if (req.readyState == 4) {
            if (req.status == 200) {
                self.successCallback();
            } else {
                console.log('error', ev);
            }
        }
    }
    req.send(fd);
    return false;
}

module.exports = AjaxForm;