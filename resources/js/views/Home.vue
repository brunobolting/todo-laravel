<template>
  <div class="users">
    <div class="loading" v-if="loading">Loading...</div>

    <div v-if="error" class="error">{{ error }}</div>

    <ul v-if="tasks">
      <li v-for="{ id, text, status } in tasks" v-bind:key="id">
        <strong>Task:</strong>
        {{ text }},
        <strong>Status:</strong>
        {{ status }}
      </li>
    </ul>
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
        })
        .catch(error => {
          this.loading = false;
          this.error = error.response.data.message || error.message;
        });
    }
  }
};
</script>