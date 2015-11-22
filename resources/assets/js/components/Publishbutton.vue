<style>

</style>

<template>
    <div class="btn exp-btn publish-btn"
         v-bind:class="{'published': published, 'busy': busy}"
         v-on:click="togglePublish"
            >
        {{ buttonText }}
    </div>
</template>

<script>
    module.exports = {
        props: ['article', 'initial'],

        data: function() {
            return {
                published: false,
                busy: false
            }
        },

        computed: {
            buttonText: function() {
                return (this.published === true) ? 'Unpublish' : 'Publish';
            }
        },

        ready: function() {
            if(this.initial == 1) {
                this.$set('published', true);
            }
        },

        methods: {
            togglePublish: function() {
                if(this.busy) {
                    return;
                }
                this.busy = true;
                this.$http.post('/admin/blog/'+this.article+'/publish', function(res) {
                    this.$set('published', res.published);
                    this.busy = false;
                }).error(function(){
                    this.busy = false;
                });
            }
        }
    }
</script>