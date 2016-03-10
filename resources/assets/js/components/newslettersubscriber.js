var NewsLetterSubscriber = function() {
    this.input = document.querySelector('#newsletter-input');
    this.submitBtn = document.querySelector('#newsletter-submit');
    this.containerEl = document.querySelector('.newsletter-input-group');
    this.alertEl = document.querySelector('#newsletter-alert');
}

NewsLetterSubscriber.prototype.init = function() {
    this.input.addEventListener('keypress', this.handleEnterPress.bind(this), false);
    this.submitBtn.addEventListener('click', this.handleSubmit.bind(this), false);
}

NewsLetterSubscriber.prototype.handleEnterPress = function(ev) {
    if(ev.keyCode !== 13) {
        return;
    }

    if(this.validates()) {
        this.subscribe();
    }
}

NewsLetterSubscriber.prototype.handleSubmit = function(ev) {
    if(this.validates()) {
        this.subscribe();
    }
}

NewsLetterSubscriber.prototype.validates = function() {
    return true;
}

NewsLetterSubscriber.prototype.subscribe = function() {
    var self = this;
    var req = new window.XMLHttpRequest();
    var fd = new FormData();
    var token = document.querySelector('#x-token').getAttribute('content');

    this.submitBtn.innerHTML = '...';

    fd.append('_token', token);
    fd.append('email', this.input.value);

    req.open('POST', '/newsletter/subscribe', true);
    req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    req.onreadystatechange = function (ev) {
        if (req.readyState == 4) {
            if (req.status == 200) {
                self.success(ev.target.response);
            } else {
                self.error(ev.target.response);
            }
        }
    }
    req.send(fd);
}

NewsLetterSubscriber.prototype.success = function(res) {
    var result = JSON.parse(res);
    this.alertEl.innerHTML = result.message;
    this.containerEl.classList.add('spent');
}

NewsLetterSubscriber.prototype.error = function(res) {
    console.log('error', res);
    this.alertEl.innerHTML = 'Ooops! An error occurred';
    this.containerEl.classList.add('spent');
}

module.exports = NewsLetterSubscriber;