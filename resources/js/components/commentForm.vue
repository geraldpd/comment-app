<template>
  <div class="comment-form">
    <form @submit.prevent="storeComment">
      <input type="text" v-model="form.name" value="john doe">
      <input type="text" v-model="form.message" name="message">
      <button type="submit">save</button>
    </form>
  </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                is_third: 0,
                parent_id: null,
                name: null,
                message: null
            }
        }
    },

    methods: {
        storeComment() {
            axios.post('api', this.form)
            .then(res => {
                console.log(res)
            })
            .catch(res => {
                console.log(res)
            });
        }
    }
}
</script>

<style>

</style>