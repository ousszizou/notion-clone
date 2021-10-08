<template>
  <div class=" mt-32">
    <h1 class=" text-5xl font-black text-gray-900">Log in</h1>
    <a href="#" class="bg-red-400 px-4 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded mt-8">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path></svg>
        <span>Continue with google</span>
    </a>
    <form class="mt-12">
      <div>
        <label for="email">Email</label>
        <input class="border border-gray-200 rounded py-1 px-3 bg-secondary" type="email" name="email" placeholder="Enter your email address...">
      </div>
      <button class="bg-red-50 border border-red-200 text-red-500 px-4 py-2 rounded mt-3">
        {{ isForgetPassword == false ? "Continue with email" : "Send reset link" }}
      </button>
      <button v-if="!isForgetPassword" class=" underline mt-2 ml-4" @click="changeButtonContent">Forgot Password?</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isForgetPassword: false
    }
  },
  methods: {
    changeButtonContent() {
      this.isForgetPassword = true
    }
  }
}
</script>
