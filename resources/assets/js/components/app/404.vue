<template>
 <div class="flex--center position--ref full--height">
    <div class="__content">
      <div class="__title __m-b-md">
        404 Not Found
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log('Component mounted.')
    },
    created() {
      modulus.title = '404 Not Found';
    }
  }
</script>