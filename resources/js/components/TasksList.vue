<template>
  <div>
    <form class="form-inline mb-3 mt-3" @submit="saveData()">
      <div class="input-group">
        <input
          type="text"
          class="form-control col-mb-6"
          placeholder="New Task"
          aria-label="New task text"
          name="todoText"
          v-model="todoText"
        />
        <div class="input-group-append">
          <button class="btn btn-primary" @click.prevent="saveData()">Save</button>
        </div>
      </div>
    </form>

    <div v-if="tasks">
      <div v-for="{ id, text, status } in tasks" v-bind:key="id">
        <input type="checkbox" name v-bind:id="id" v-bind:value="id" v-bind:checked="status" />
        <label v-bind:for="id">{{text}}</label>
        <button v-on:click="deleteTask(id)">Delete</button>
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
      error: null,
      todoText: ""
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
    },
    saveData() {
      axios
        .post("/api/tasks/save", { task: this.todoText })
        .then(response => {
          console.log(response);
          this.fetchData();
        })
        .catch(error => {
          console.log("cago no pau");
        });
    },
    deleteTask(id) {
      axios
        .delete(`/api/tasks/${id}`)
        .then(response => {
          console.log(response.data);
          this.fetchData();
        })
        .catch(error => {
          this.error = error.response.data.message || error.message;
        });
    }
  }
};
</script>