<template>
  <div id="nav">
    <md-toolbar class="md-transparent">
      <md-menu md-size="medium" md-align-trigger>
        <span v-if="isLoggedIn">
          <md-button md-menu-trigger>
            <router-link to="/home">URGENCE PARENTAL</router-link>
          </md-button>
          <md-button md-menu-trigger @click="logout">
            <router-link to="/logOut">Logout</router-link>
          </md-button>
          <md-button md-menu-trigger>
            <router-link to="/my-account">My Account</router-link>
          </md-button>
          <!-- <a @click="logout">Logout</a> -->
        </span>
        <span v-else>
          <md-button md-menu-trigger>
            <router-link to="/home">URGENCE PARENTAL</router-link>
          </md-button>
          <md-button md-menu-trigger>
            <router-link to="/login">Login</router-link>
          </md-button>
          <md-button md-menu-trigger>
            <router-link to="/register">Register</router-link>
          </md-button>
          <md-button md-menu-trigger>
            <router-link to="/about">About</router-link>
          </md-button>
        </span>
      </md-menu>
    </md-toolbar>
    <router-view />
  </div>
</template>

<script>
export default {
  name: "Menu",
  computed: {
    isLoggedIn: function () {
      return this.$store.getters.isAuthenticated;
    },
  },
  methods: {
    async logout() {
      await this.$store.dispatch("LogOut");
      this.$router.push("/login");
    },
  },
};
</script>

<style scoped>
#nav a {
  font-weight: bold;
  color: #2c3e50;
}
a:hover {
  cursor: pointer;
}
#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
