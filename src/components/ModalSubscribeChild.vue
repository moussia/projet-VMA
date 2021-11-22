<template>
  <div>
    <md-dialog :md-active.sync="showDialog">
      <md-dialog-title>Preferences</md-dialog-title>
      <form novalidate class="toto md-layout-item md-size-100">
        <h2>you can change your information here</h2>

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
