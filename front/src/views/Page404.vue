<template>
  <div class="error404">
    <h1 class="blue">Oups... Erreur 404</h1>
    <h2>Nous sommes désolés, mais la page que vous recherchez n'existe pas.</h2>
    <p>
      S'il vous plaît vérifiez l'adresse indiquée et essayez à nouveau ou aller

      <router-link to="/"> à la page d'accueil</router-link>
    </p>
  </div>
</template>

<style lang="scss" scoped>
.blue {
  color: blue;
}
</style>
