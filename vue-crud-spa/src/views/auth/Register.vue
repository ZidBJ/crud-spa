<template>
  <div class="home col-5 mx-auto py-5 mt-5">
    <h1 class="text-center">Register</h1>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="email">Email address:</label>
          <input
            type="email"
            v-model="registerForm.email"
            class="form-control"
            id="email"
          />
          <span class="text-danger" v-if="errors.email">
            {{ errors.email[0] }}
          </span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input
            type="password"
            v-model="registerForm.password"
            class="form-control"
            id="password"
          />
          <span class="text-danger" v-if="errors.password">
            {{ errors.password[0] }}
          </span>
        </div>
        <button
          type="submit"
          @click.prevent="register"
          class="btn btn-primary btn-block"
        >
          Register
        </button>
      </div>
    </div>
  </div>
</template>

 <script>
import Auth from "@/apis/Auth";
export default {
  data() {
    return {
      registerForm: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },

  methods: {
    register() {
      Auth.register(this.registerForm)
        .then(() => {
          this.$router.push({ name: "Login" });
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
};

// import Auth from "@/apis/Auth";
// export default {
//   data() {
//     return {
//       registerForm: {
//         gaga: "",
//         email: "",
//         password: "",
//       },
//       errors: [],
//     };
//   },
//   methods: {
//     register() {
//       Auth.register(this.registerForm)
//         .then((res) => {
//           console.log(res);
//           this.$router.push({ name: "Login" });
//         })
//         .catch(function (error) {
//           console.error(error);
//           if (error.response.status === 422) {
//             this.errors = error.response.data.errors;
//           }
//         });
//     },
//   },
// };
</script>