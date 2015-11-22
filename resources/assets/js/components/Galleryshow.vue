<style>

</style>

<template>
    <div class="gallery-container">
        <div class="gallery-item"
             v-for="image in images"
                >
            <div v-on:click="removeImage(image)" class="gallery-item-delete-btn">x</div>
            <img v-bind:src="image.thumb_src" alt="gallery image"/>
        </div>
    </div>
</template>

<script>
    module.exports = {

        props:['geturl', 'gallery'],

        data: function() {
            return {
                images: []
            }
        },

        ready: function() {
            this.$http.get(this.geturl, function(res) {
                this.$set('images', res);
            }).error(function(res){
            });

            this.$on('add-image', function(image) {
                this.addImage(image);
            });
        },

        methods: {
            addImage: function(image) {
                this.images.push(image);
            },

            removeImage: function(image) {
                this.$http.delete('/admin/uploads/galleries/'+this.gallery+'/images/'+image.image_id, function() {
                    this.images.$remove(image);
                }).error(function(){});
            }
        }
    }
</script>