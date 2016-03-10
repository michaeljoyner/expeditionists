<style>

</style>

<template>
    <p class="upload-instruction">Click below to upload an PDF file.</p>
    <label for="{{ 'profile-upload' + uniqueid}}"  class="single-upload-label">
        <img :src="imageSrc"  alt="" class="profile-image" v-bind:class="{'processing' : uploading, 'large': size === 'large', 'round': shape === 'round', 'full': size === 'full' }"/>
        <input v-on:change="processFile" type="file" id="{{ 'profile-upload' + uniqueid}}"/>
    </label>
    <div class="upload-progress-container" v-show="uploading">
        <span class="upload-progress-bar"
              v-bind:style="{width: uploadPercentage + '%'}"></span>
    </div>
    <p class="upload-message"
       v-bind:class="{'error': uploadStatus === 'error', 'success': uploadStatus === 'success'}"
       v-show="uploadMsg !== ''">{{ uploadMsg }}
    </p>
</template>

<script>
    module.exports = {
        props: ['default', 'url', 'shape', 'size', 'uniqueid'],

        data: function() {
            return {
                imageSource: '',
                uploadMsg: '',
                uploading: false,
                uploadStatus: '',
                uploadPercentage: 0
            }
        },

        computed: {
            imageSrc: function() {
                return this.imageSource ? this.imageSource : this.default;
            }
        },

        methods: {
            processFile: function(ev) {
                var file = ev.target.files[0];
                this.clearMessage();
                if(file.type.indexOf('application/pdf') === -1) {
                    this.showInvalidFile(file.name);
                    return;
                }
                this.handleFile(file);
            },

            showInvalidFile: function(name) {
                this.uploadMsg = name + ' is not a valid PNG file';
                this.uploadStatus = 'error';
            },

            handleFile: function(file) {
                this.imageSource = '/images/assets/icons/doc_loading.png';
                this.uploadFile(file);
            },

            uploadFile: function(file) {
                var self = this;
                var fd = new FormData();
                fd.append('file', file);
                this.$http.post(this.url, fd, function(res) {
                    this.imageSource = '/images/assets/icons/doc_loaded.png';
                    this.uploadMsg = "Uploaded successfully";
                    this.uploadStatus = 'success'
                    this.uploading = false;
                }, {
                    beforeSend: function(req, options) {
                        req.upload.addEventListener('progress', function(ev) {
                            self.showProgress(parseInt(ev.loaded/ev.total*100));
                        });
                    }
                }).error(function() {
                    this.uploadMsg = 'The upload failed';
                    this.uploadStatus = 'error';
                });
            },

            showProgress: function(progress) {
                console.log(progress + '% complete!');
                this.uploadPercentage = progress;
            },

            clearMessage: function() {
                this.uploadMsg = ''
            }
        }

    }
</script>