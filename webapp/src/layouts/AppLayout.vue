<template>
  <component :is="layout">
    <slot />
  </component>
</template>

<script>
const defaultLayout = "ProductLayout";
export default {
  computed: {
    layout() {
      let layout = this.$route.meta.layout || defaultLayout;
      return () => import(`@/layouts/${layout}.vue`);
    }
  }
}
</script>
