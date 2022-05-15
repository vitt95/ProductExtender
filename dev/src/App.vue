<template>
<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li @click="changeActive" data-id="1" class="nav-item">
    <router-link
      id="nav-link-1"
      class="nav-link"
      to="/definition-name"
      >Definition name</router-link
    >
  </li>
  <li @click="changeActive" data-id="2" class="nav-item">
    <router-link
      id="nav-link-2"
      class="nav-link"
      to="/field-definition"
      >Define fields</router-link
    >
  </li>
  <li @click="changeActive" data-id="3" class="nav-item disabled">
    <router-link
      class="nav-link"
      id="nav-link-3"
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

  setup(props) {

    function changeActive(evt = null) {
      let href = document.location.href;
      let slug = href.split('/');
      slug = slug[slug.length - 1];

      let navlinks = document.getElementsByClassName('nav-link');
      for(let i = 0; i < navlinks.length; i++){
        navlinks[i].classList.remove('active');
      }

      if(slug == 'field-definition'){
        if(!document.getElementById('nav-link-2').classList.contains('active')){
          document.getElementById('nav-link-2').classList.add('active')
        }
      }

      if(slug == 'definition-name'){
        if(!document.getElementById('nav-link-1').classList.contains('active')){
          document.getElementById('nav-link-1').classList.add('active')
        }
      }
    }

    return {
      changeActive,
    }
  },

  mounted() {
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
