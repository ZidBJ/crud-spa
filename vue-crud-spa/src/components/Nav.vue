<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse">
      <!-- for logged-in user-->
      <div class="navbar-nav" v-if="isLoggedIn">
        <router-link to="/dashboard" class="nav-item nav-link"
          >Dashboard</router-link
        >
        <router-link to="/books" class="nav-item nav-link">Books</router-link>
        <a class="nav-item nav-link" style="cursor: pointer" @click="logout"
          >Logout</a
        >
      </div>
      <!-- for non-logged user-->
      <div class="navbar-nav" v-else>
        <router-link to="/" class="nav-item nav-link">Home</router-link>
        <router-link to="/login" class="nav-item nav-link">login</router-link>
        <router-link to="/register" class="nav-item nav-link"
          >Register
        </router-link>
        <router-link to="/about" class="nav-item nav-link">About</router-link>
      </div>
    </div>
  </nav>
</template>

<script>
import Auth from "@/apis/Auth";
import Cookie from "js-cookie";
export default {
  name: "Nav",
  data() {
    return {};
  },
  created() {},
  computed: {
    isLoggedIn() {
      let isLoggedIn = Cookie.get("isLoggedIn");
      if (isLoggedIn === "true") {
        return true;
      } else {
        return false;
      }
    },
  },
  methods: {
    logout() {
      Auth.logout()
        .then((response) => {
          Cookie.set("isLoggedIn", "false");
          console.log(response);
          this.$router.push({ name: "home" });
        })
        .catch(function (error) {
          console.error(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>