<template>
  <div>
    <md-dialog :md-active.sync="showDialog">
      <md-dialog-title>Preferences</md-dialog-title>
      <form novalidate class="toto">
        <md-content>
          <h2>Enter your child's information</h2>

          <h2>
            You must enter your child's information in order to book
            professional emergencies.
          </h2>
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
              Last Name of your child:
              <md-input
                name="last-name"
                id="last-name"
                autocomplete="given-name"
                :disabled="sending"
              />
            </p>
          </div>
        </md-content>
      </form>

      <md-tabs md-dynamic-height> </md-tabs>

      <md-dialog-actions>
        <md-button class="md-primary" @click="showDialog = false"
          >Close</md-button
        >
        <md-button class="md-primary" @click="showDialog = false"
          >Save</md-button
        >
      </md-dialog-actions>
    </md-dialog>

    <md-button class="md-primary md-raised" @click="showDialog = true"
      >Show Dialog</md-button
    >
  </div>
</template>

<script>
export default {
  name: 'ModalSubscribeChild',
  data: () => ({
    showDialog: false,
  }),
};
</script>

<style lang="scss" scoped>
.md-dialog .md-dialog-container {
  max-width: 768px;
}
</style>
