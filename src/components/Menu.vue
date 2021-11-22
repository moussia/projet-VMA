<template>
  <div id="nav">
    <md-toolbar class="md-transparent">
      <md-menu md-size="medium" md-align-trigger>
        <md-button md-menu-trigger>
          <router-link to="/">Home</router-link></md-button
        >
        <md-button md-menu-trigger>
          <router-link to="/about">About</router-link>
        </md-button>
        <md-button md-menu-trigger>
          <router-link to="/login">Login</router-link>
        </md-button>
        <md-button md-menu-trigger>
          <router-link to="/register">Register</router-link>
        </md-button>
        <md-button md-menu-trigger>
          <router-link to="/my-account">My Account</router-link>
        </md-button>
      </md-menu>
    </md-toolbar>
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'Menu',
};
</script>

<style scoped>
#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.md-menu-exact-active {
  color: #42b983;
}
</style>
