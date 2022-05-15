<template>
<div>
    <div class="heading">
      <h3>Please, introduce the definition name. This will be checked for duplication.</h3>
    </div>
    <form>
      <NameDefinition />
    </form>
</div>

</template>

<script>
/* eslint-disable */

import NameDefinition from "@/components/NameDefinition.vue";
export default {
  name: "Index",
  components: { NameDefinition },

  setup(props) {},

  mounted() {},
};
</script>

<style>
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
</style>
