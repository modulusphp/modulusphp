<template>
  <div>
    <h1>Hello World</h1>
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