import Api from "./Api";
import Csrf from "./Csrf";

export default {
  async register(data) {
    await Csrf.getCsrf();
    return Api.post("register", data);
  },

  async login(data) {
    await Csrf.getCsrf();
    return Api.post("login", data);
  },

  async logout() {
    await Csrf.getCsrf();
    return Api.post("logout");
  },

  getUser() {
    return Api.get("user");
  },
};
