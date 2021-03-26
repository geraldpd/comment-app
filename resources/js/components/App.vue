<template>
    <div class="commentContainer">

        <div class="heading">

            <h2> What comes first? chicken or egg? </h2>

            <comment-list :comments="comments"></comment-list>

            <comment-form></comment-form>

        </div>
    </div>
</template>

<script>
import commentForm from  './commentForm'
import commentList from  './commentList'

export default {
    data() {
        return {
            comments: []
        }
    },

    methods: {
        getComments() {
            axios.get('api')
            .then(res => {
                this.comments = res.data
            })
            .catch(res => {
                console.log(res)
            });
        }
    },

    created() {
        this.getComments();
    },

    components: {
        commentForm,
        commentList
    }
}
</script>

<style scoped>

</style>