<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-danger" role="alert" v-if="error !== null">
          {{ error }}
        </div>

        <div class="card card-default">
          <div class="card-header">Login</div>
          <div class="card-body">
            <form>
              <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right"
                  >E-Mail Address</label
                >
                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    v-model="loginFrom.email"
                    required
                    autofocus
                    autocomplete="off"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >Password</label
                >
                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    v-model="loginFrom.password"
                    required
                    autocomplete="off"
                  />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="login"
                  >
                    Login
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Auth from "@/apis/Auth";
import Cookie from "js-cookie";

export default {
  data() {
    return {
      loginFrom: {
        email: "",
        password: "",
      },
      error: null,
    };
  },
  methods: {
    login() {
      Auth.login(this.loginFrom)
        .then((res) => {
          console.log(res);
          Cookie.set("isLoggedIn", "true");
          this.$router.push({ name: "Dashboard" });
        })
        .catch(function (error) {
          console.error(error);
        });
    },
  },
};
</script>