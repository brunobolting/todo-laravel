<template>
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
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      todoText: ""
    };
  },
  methods: {
    saveData() {
      axios
        .post("/api/tasks/save", { task: this.todoText })
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.log("cago no pau");
        });
    }
  }
};
</script>