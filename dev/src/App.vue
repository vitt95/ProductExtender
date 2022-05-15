<template>
<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li data-id="def-name" class="nav-item">
    <router-link
      id="def-name"
      class="nav-link active"
      to="/"
      >Definition name</router-link
    >
  </li>
  <li data-id="2" class="nav-item">
    <router-link
      class="nav-link"
      to="/field-definition"
      >Define fields</router-link
    >
  </li>
  <li data-id="3" class="nav-item disabled">
    <router-link
      class="nav-link"
      id="messages-tab"
      data-toggle="tab"
      to="#messages"
      role="tab"
      aria-controls="messages"
      aria-expanded="true"
      >Messages</router-link>
  </li>
</ul>
  <div class="card">
    <router-view></router-view>
  </div>
</div>
</template>

<script>
/* eslint-disable */
export default {
  name: 'App',

  mounted() {
    var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    console.log(newURL);
  },

  methods: {

  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.disabled {
  pointer-events: none;
  cursor: none;
}

.heading {
  text-align: center;
  padding-left: 20px;
  padding-top: 20px;
  padding-bottom: 20px;
}

.card {
  padding: 20px;
}
</style>
