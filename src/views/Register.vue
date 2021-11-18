<template>
  <div>
    <form
      novalidate
      class="toto md-layout-item md-size-50"
      @submit.prevent="validateUser"
    >
      <md-card class="">
        <md-card-header>
          <div class="md-title">Register</div>
        </md-card-header>

        <md-card-content>
          <div>
            <md-radio v-model="radio" value="parent" class="md-primary"
              >Parent</md-radio
            >
            <md-radio v-model="radio" value="professional" class="md-primary"
              >Professional</md-radio
            >
          </div>
        </md-card-content>

        <md-card-content>
          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('firstName')">
                <label for="first-name">First Name</label>
                <md-input
                  name="first-name"
                  id="first-name"
                  autocomplete="given-name"
                  v-model="form.firstName"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.firstName.required"
                  >The first name is required</span
                >
                <span class="md-error" v-else-if="!$v.form.firstName.minlength"
                  >Invalid first name</span
                >
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('lastName')">
                <label for="last-name">Last Name</label>
                <md-input
                  name="last-name"
                  id="last-name"
                  autocomplete="family-name"
                  v-model="form.lastName"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.lastName.required"
                  >The last name is required</span
                >
                <span class="md-error" v-else-if="!$v.form.lastName.minlength"
                  >Invalid last name</span
                >
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('gender')">
                <label for="gender">Gender</label>
                <md-select
                  name="gender"
                  id="gender"
                  v-model="form.gender"
                  md-dense
                  :disabled="sending"
                >
                  <md-option></md-option>
                  <md-option value="M">M</md-option>
                  <md-option value="F">F</md-option>
                </md-select>
                <span class="md-error">The gender is required</span>
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('age')">
                <label for="age">Age</label>
                <md-input
                  type="number"
                  id="age"
                  name="age"
                  autocomplete="age"
                  v-model="form.age"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.age.required"
                  >The age is required</span
                >
                <span class="md-error" v-else-if="!$v.form.age.maxlength"
                  >Invalid age</span
                >
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('phonenumber')">
                <label for="phonenumber">Phone number</label>
                <md-input
                  type="number"
                  name="phonenumber"
                  id="phonenumber"
                  autocomplete="phonenumber"
                  v-model="form.phonenumber"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.phonenumber.required"
                  >The phonenumber is required</span
                >
                <span
                  class="md-error"
                  v-else-if="!$v.form.phonenumber.phonenumber"
                  >Invalid phonenumber</span
                >
              </md-field>
            </div>
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('city')">
                <label for="city">City</label>
                <md-input
                  type="text"
                  name="city"
                  id="city"
                  autocomplete="city"
                  v-model="form.city"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.city.required"
                  >The city is required</span
                >
                <span class="md-error" v-else-if="!$v.form.city"
                  >Invalid city</span
                >
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('adress')">
                <label for="adress">Adress</label>
                <md-input
                  type="text"
                  name="adress"
                  id="adress"
                  autocomplete="adress"
                  v-model="form.adress"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.adress.required"
                  >The adress is required</span
                >
                <span class="md-error" v-else-if="!$v.form.adress"
                  >Invalid adress</span
                >
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('zipcode')">
                <label for="zipcode">Zip code</label>
                <md-input
                  type="number"
                  name="zipcode"
                  id="zipcode"
                  autocomplete="zipcode"
                  v-model="form.zipcode"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.zipcode.required"
                  >The zipcode is required</span
                >
                <span class="md-error" v-else-if="!$v.form.zipcode"
                  >Invalid zipcode</span
                >
              </md-field>
            </div>
            <div class="md-layout-item md-small-size-100">
              <md-field>
                <label>Only images</label>
                <md-file v-model="single" accept="image/*" />
              </md-field>
            </div>
          </div>

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
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
                  >The email is required</span
                >
                <span class="md-error" v-else-if="!$v.form.email.email"
                  >Invalid email</span
                >
              </md-field>
            </div>
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('password')">
                <label for="email">Password</label>
                <md-input
                  type="password"
                  name="password"
                  id="password"
                  autocomplete="password"
                  v-model="form.password"
                  :disabled="sending"
                />
                <span class="md-error" v-if="!$v.form.password.required"
                  >The password is required</span
                >
                <span class="md-error" v-else-if="!$v.form.password.password"
                  >Invalid password</span
                >
              </md-field>
            </div>
          </div>
        </md-card-content>

        <md-card-actions>
          <md-button
            type="submit"
            class="md-raised md-primary"
            :disabled="sending"
            >Subscribe</md-button
          >
        </md-card-actions>

        <router-link to="/login">Login</router-link>
      </md-card>

      <md-snackbar :md-active.sync="userSaved"
        >The user {{ lastUser }} was saved with success!</md-snackbar
      >
    </form>
  </div>
</template>

<script>
import { validationMixin } from 'vuelidate';
import {
  required,
  email,
  minLength,
  maxLength,
} from 'vuelidate/lib/validators';

export default {
  name: 'Register',
  mixins: [validationMixin],

  data: () => ({
    form: {
      firstName: null,
      lastName: null,
      phonenuber: null,
      gender: null,
      age: null,
      email: null,
      city: null,
      adress: null,
      zipcode: null,
      password: null,
    },
    userSaved: false,
    sending: false,
    lastUser: null,
    radio: 'accent',
  }),
  validations: {
    form: {
      firstName: {
        required,
        minLength: minLength(3),
      },
      lastName: {
        required,
        minLength: minLength(3),
      },
      age: {
        required,
        maxLength: maxLength(3),
      },
      city: {
        required,
      },
      adress: {
        required,
      },
      gender: {
        required,
      },
      zipcode: {
        required,
      },
      phonenumber: {
        required,
      },
      email: {
        required,
        email,
      },
      password: {
        required,
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
      this.form.firstName = null;
      this.form.lastName = null;
      this.form.age = null;
      this.form.zipcode = null;
      this.form.adress = null;
      this.form.city = null;
      this.form.gender = null;
      this.form.email = null;
      this.form.phonenumber = null;
      this.form.password = null;
    },
    saveUser() {
      this.sending = true;

      // Instead of this timeout, here you can call your API
      window.setTimeout(() => {
        this.lastUser = `${this.form.firstName} ${this.form.lastName}`;
        this.userSaved = true;
        this.sending = false;
        this.clearForm();
      }, 1500);
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

.md-radio {
  display: flex;
}
</style>
