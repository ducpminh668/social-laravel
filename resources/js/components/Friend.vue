<template>
  <div>
    <p class="text-center" v-if="loading">Loading...</p>
    <p class="text-center" v-if="!loading">
      <button class="btn btn-success" v-if="status == 0" >Add Friend</button>
      <button
        class="btn btn-success"
        v-if="status == 'pending'"
        @click="accept_friend"
      >Accept Friend</button>
      <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
      <span class="text-success" v-if="status == 'friends'">Friends</span>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      status: "",
      loading: true
    };
  },
  mounted() {
    axios
      .get("/check_relationship_status/" + this.profile_user_id)
      .then(res => {
        console.log(res);
        this.status = res.data.status;
        this.loading = false;
      });
  },
  props: ["profile_user_id"]
};
</script>
