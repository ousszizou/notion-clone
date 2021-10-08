<template>
  <div class="flex items-center justify-between h-20 text-sm font-medium">
    <div>
      <Logo />
    </div>
    <div v-if="isProductLayout">
      <router-link class="mr-4 hover:bg-gray-200 p-2 rounded" to="/contact-sales">Contact sales</router-link>
      <span class="w-px border-l rounded-full border-gray-300"></span>
      <router-link class="ml-4 hover:bg-gray-200 p-2 rounded" to="/login">Log in</router-link>
      <router-link class="p-2 ml-4 bg-base hover:bg-base-hover rounded text-white border border-b-color" to="/signup">Try Notion free</router-link>
    </div>
  </div>
</template>
<script>
import Logo from "./Logo.vue"
export default {
  components: { Logo },
  data() {
    return {
      isProductLayout: ''
    }
  },
  mounted() {
    if (this.$route.meta.layout != undefined) {
      this.isProductLayout = false;
    } else this.isProductLayout = true;
  }
}
</script>
