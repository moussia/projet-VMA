<template>
  <div>
    <h2>Register</h2>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="firstName">Firstname</label>
        <input
          type="text"
          v-model="user.firstName"
          v-validate="'required'"
          name="firstName"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('firstName') }"
        />
        <div
          v-if="submitted && errors.has('firstName')"
          class="invalid-feedback"
        >
          {{ errors.first("firstName") }}
        </div>
      </div>
      <div class="form-group">
        <label for="lastName">Lastname</label>
        <input
          type="text"
          v-model="user.lastName"
          v-validate="'required'"
          name="lastName"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('lastName') }"
        />
        <div
          v-if="submitted && errors.has('lastName')"
          class="invalid-feedback"
        >
          {{ errors.first("lastName") }}
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input
          type="text"
          v-model="user.email"
          v-validate="'required'"
          name="email"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('email') }"
        />
        <div v-if="submitted && errors.has('email')" class="invalid-feedback">
          {{ errors.first("email") }}
        </div>
      </div>
      <div class="form-group">
        <label htmlFor="password">Password</label>
        <input
          type="password"
          v-model="user.password"
          v-validate="{ required: true, min: 3, max: 20 }"
          name="password"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('password') }"
        />
        <div
          v-if="submitted && errors.has('password')"
          class="invalid-feedback"
        >
          {{ errors.first("password") }}
        </div>
      </div>
      <div class="form-group">
        <label for="birthdate">Birthdate</label>
        <input
          type="date"
          v-model="user.birthdate"
          v-validate="'required'"
          name="birthdate"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('birthdate') }"
        />
        <div
          v-if="submitted && errors.has('birthdate')"
          class="invalid-feedback"
        >
          {{ errors.first("birthdate") }}
        </div>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input
          type="number"
          v-model="user.phone"
          v-validate="'required'"
          name="phone"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('phone') }"
        />
        <div v-if="submitted && errors.has('phone')" class="invalid-feedback">
          {{ errors.first("phone") }}
        </div>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input
          type="text"
          v-model="user.address"
          v-validate="'required'"
          name="address"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('address') }"
        />
        <div v-if="submitted && errors.has('address')" class="invalid-feedback">
          {{ errors.first("address") }}
        </div>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input
          type="text"
          v-model="user.city"
          v-validate="'required'"
          name="city"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('city') }"
        />
        <div v-if="submitted && errors.has('city')" class="invalid-feedback">
          {{ errors.first("city") }}
        </div>
      </div>
      <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input
          type="text"
          v-model="user.zipcode"
          v-validate="'required'"
          name="zipcode"
          class="form-control"
          :class="{ 'is-invalid': submitted && errors.has('zipcode') }"
        />
        <div v-if="submitted && errors.has('zipcode')" class="invalid-feedback">
          {{ errors.first("zipcode") }}
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" :disabled="status.registering">
          Register
        </button>
        <img
          v-show="status.registering"
          src="data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA=="
        />
        <router-link to="/login" class="btn btn-link">Cancel</router-link>
      </div>
    </form>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  data() {
    return {
      user: {
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        birthdate: "",
        phone: "",
        address: "",
        city: "",
        zipcode: "",
        roles: ["ROLE_USER"],
      },
      submitted: false,
    };
  },
  computed: {
    ...mapState("account", ["status"]),
  },
  methods: {
    ...mapActions("account", ["register"]),
    handleSubmit(e) {
      this.submitted = true;
      this.$validator.validate().then((valid) => {
        if (valid) {
          this.register(this.user);
        }
      });
    },
  },
};
</script>