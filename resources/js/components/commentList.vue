<template>
    <div>

        <div v-for="(comment, index) in comments" :key="index">
            <comment-item
                :comment=comment
                class=""
            ></comment-item>
        </div>

    </div>
</template>

<script>
import commentItem from  './commentItem'

export default {
    props: ['comments'],

    components: {
        commentItem
    }
}
</script>

<style>

</style>