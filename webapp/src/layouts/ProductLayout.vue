<template>
  <div>
    <the-navbar />
    <slot />
  </div>
</template>

<script>
import TheNavbar from '../components/layouts/TheNavbar'
export default {
  components: {TheNavbar}
}
</script>
