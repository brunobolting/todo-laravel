<template>
  <div>
    <!-- <p>
      <router-link :to="{ name: 'home' }">Home</router-link>|
      <router-link :to="{ name: 'hello' }">Hello World</router-link>
    </p>-->

    <menu-component></menu-component>
    <div class="container">
      <!-- <router-view></router-view> -->
      <form-component></form-component>
      <div v-if="tasks">
        <div v-for="{ id, text, status } in tasks" v-bind:key="id">
          <input type="checkbox" name v-bind:id="id" v-bind:value="id" v-bind:checked="status" />
          <label v-bind:for="id">{{text}}</label>
          <!-- <strong>Task:</strong>
          {{ text }},
          <strong>Status:</strong>
          {{ status }}-->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      loading: false,
      tasks: null,
      error: null
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.error = this.tasks = null;
      this.loading = true;
      axios
        .get("/api/tasks")
        .then(response => {
          this.loading = false;
          this.tasks = response.data;
          console.log(response);
        })
        .catch(error => {
          this.loading = false;
          this.error = error.response.data.message || error.message;
        });
    }
  }
};
</script>