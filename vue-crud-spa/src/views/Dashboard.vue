<template>
  <div>Welcome {{ email }}</div>
</template>

<script>
import Auth from "@/apis/Auth";
export default {
  name: "Dashboard",
  data() {
    return {
      email: null,
    };
  },

  created() {
    Auth.getUser().then((res) => {
      console.log(res);
      this.email = res.data.email;
    });
  },
};
</script>