<template>
  <div class="flex--center position--ref full--height">
    <div class="__content">
      <div class="__title __m-b-md">
        modulusPHP
        <span class="loader loader-circles"></span>
      </div>

      <div class="__info">
        <span>bootstrap: 4.0</span>
        <span>vue.js: 2.5.16</span>
        <span>jquery: 3.3.1</span>
        <span>moment: 2.22.2</span>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log('Component mounted.');
    },
    created() {
      modulus.title = 'Home | modulusPHP';
    }
  }
</script>