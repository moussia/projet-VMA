<template>
  <div class="MyAccount">
    <form novalidate class="toto md-layout-item md-size-50">
      <md-tabs md-dynamic-height>
        <md-tab md-label="General">
          <h2>Vous pouvez changer vos informations ici</h2>
          <div>
            <p>
              Prénom :
              <md-input
                name="first-name"
                id="first-name"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Nom :
              <md-input
                name="last-name"
                id="last-name"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Age :
              <md-input
                name="age"
                id="age"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Téléphone :
              <md-input
                name="phonenumber"
                id="phonenumber"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Adresse :
              <md-input
                name="address"
                id="address"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Ville :
              <md-input
                name="city"
                id="city"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Code postal :
              <md-input
                name="zipcode"
                id="zipcode"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
          </div>
          <md-button
            type="submit"
            class="md-raised md-primary"
            :disabled="sending"
            >Modifier</md-button
          >
        </md-tab>

        <md-tab md-label="Enfant">
          <h2>Vous pouvez modifier ici les informations sur votre enfant</h2>
          <div>
            <p>
              Age de votre enfant
              <md-input
                name="age-child"
                id="age-child"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              Son prénom:
              <md-input
                name="last-name"
                id="last-name"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <md-button
              type="submit"
              class="md-raised md-primary"
              :disabled="sending"
              >Modifier</md-button
            >
          </div>
        </md-tab>
        <md-tab md-label="Information de paiement">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam
            mollitia dolorum dolores quae commodi impedit possimus qui, atque at
            voluptates cupiditate. Neque quae culpa suscipit praesentium
            inventore ducimus ipsa aut.
          </p>
        </md-tab>
      </md-tabs>
    </form>
  </div>
</template>

<script>
export default {
  name: 'MyAccount',
};
</script>

<style lang="scss" scoped>
.toto {
  display: inline-block;
  margin-top: 5%;
  margin-bottom: 5%;
}

.md-radio {
  display: flex;
}
</style>
