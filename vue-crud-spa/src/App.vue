<template>
  <div class="container">
    <div class="text-center" style="margin: 20px 0px 20px 0px">
      <a href="https://shouts.dev/" target="_blank"
        ><img src="https://i.imgur.com/Nt3kJXa.png" /></a
      ><br />
      <span class="text-secondary"
        >Laravel SPA with Vue 3, Auth (Sanctum), CURD Example</span
      >
    </div>
    <Nav />
    <router-view />
  </div>
</template>

<script>
import Nav from "@/components/Nav";
export default {
  name: "App",
  components: {
    Nav,
  },
  data() {
    return {
      isLoggedIn: false,
    };
  },
  created() {
    this.isLoggedIn = true;
  },
  methods: {},
};
</script>