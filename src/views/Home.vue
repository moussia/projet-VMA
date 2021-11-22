<template>
  <div class="home">
    <HelloWorld msg="This is page home" />
    <ModalSubscribeChild />
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue';
import ModalSubscribeChild from '@/components/ModalSubscribeChild.vue';

export default {
  name: 'Home',
  components: {
    HelloWorld,
    ModalSubscribeChild,
  },
};
</script>
