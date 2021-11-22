<template>
  <div class="MyAccount">
    <form novalidate class="toto md-layout-item md-size-50">
      <md-tabs md-dynamic-height>
        <md-tab md-label="General">
          <h2>you can change your information here</h2>
          <div>
            <p>
              My First name:
              <md-input
                name="first-name"
                id="first-name"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My Last name:
              <md-input
                name="last-name"
                id="last-name"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My Age:
              <md-input
                name="age"
                id="age"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My Phone number:
              <md-input
                name="phonenumber"
                id="phonenumber"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My Address:
              <md-input
                name="address"
                id="address"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My City:
              <md-input
                name="city"
                id="city"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My zipcode:
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
            >Modify</md-button
          >
        </md-tab>

        <md-tab md-label="Child">
          <h2>you can modify here, the information concerning your child.</h2>
          <div>
            <p>
              Age of your child
              <md-input
                name="age-child"
                id="age-child"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
            <p>
              My Last name:
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
              >Modify</md-button
            >
          </div>
        </md-tab>
        <md-tab md-label="payment information">
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
