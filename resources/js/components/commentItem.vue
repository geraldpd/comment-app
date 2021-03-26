<template>
  <div class="comment">
      <span> <strong>{{ comment.name }}</strong> said: </span>
      <p>{{ comment.message }}</p>
      <span>{{ comment.created_at }}</span>
  </div>
</template>

<script>
export default {
    props: ['comment']
}
</script>

<style>
    .comment{
        background-color:gray;
        margin: 2px;
    }
</style>