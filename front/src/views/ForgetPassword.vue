<template>
  <div>
    <form
      novalidate
      class="toto md-layout-item md-size-30"
      @submit.prevent="validateUser"
    >
      <md-card>
        <md-card-header>
          <div class="md-title">Mot de passe oublié</div>
        </md-card-header>

        <md-card-content>
          <md-field :class="getValidationClass('email')">
            <label for="email">Email</label>
            <md-input
              type="email"
              name="email"
              id="email"
              autocomplete="email"
              v-model="form.email"
              :disabled="sending"
            />
            <span class="md-error" v-if="!$v.form.email.required"
              >L'email est obligatoire</span
            >
            <span class="md-error" v-else-if="!$v.form.email.email"
              >Email invalide</span
            >
          </md-field>
        </md-card-content>

        <md-card-actions>
          <md-button
            type="submit"
            class="md-raised md-primary"
            :disabled="sending"
            >Envoyer</md-button
          >
        </md-card-actions>
        <router-link to="/connexion">Connexion</router-link>
      </md-card>
    </form>
  </div>
</template>

<script>
import { validationMixin } from 'vuelidate';
import { required, email } from 'vuelidate/lib/validators';

export default {
  name: 'ForgetPassword',
  mixins: [validationMixin],
  data: () => ({
    form: {
      email: null,
    },
    userSaved: false,
    sending: false,
    lastUser: null,
  }),
  validations: {
    form: {
      email: {
        required,
        email,
      },
    },
  },
  methods: {
    getValidationClass(fieldName) {
      const field = this.$v.form[fieldName];
      if (field) {
        return {
          'md-invalid': field.$invalid && field.$dirty,
        };
      }
    },
    clearForm() {
      this.$v.$reset();
      this.form.email = null;
    },
    saveUser() {
      this.sending = true;
    },
    validateUser() {
      this.$v.$touch();

      if (!this.$v.$invalid) {
        this.saveUser();
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.toto {
  display: inline-block;
}
</style>
