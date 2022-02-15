<template>
  <div>
      <Header />
      <Banner />

      <main class="container-fluid">
         <router-view></router-view>
      </main>
  </div>
   

</template>

<script>
import Header from '../components/Header';
import Banner from '../components/Banner';

export default {
     name: 'App',
     components: {
         Header,
         Banner,
     },
}
</script>

<style lang="scss">

</style>