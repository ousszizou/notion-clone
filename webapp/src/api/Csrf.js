import Api from "./Api";

export default {
  getCsrfToken() {
    return Api.get("/sanctum/csrf-token");
  },
};
