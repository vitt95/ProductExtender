<template>
  <div class="row justify-content-center">
    <div class="col-sm-4 align-center">
      <div id="def-name-form" class="form-group has-danger">
        <label class="form-control-label justify-content-center" for="input-definition">Definition name</label>
        <input
          type="text"
          class="form-control is-invalid"
          id="input-definition"
          value="This is a success value"
          style="text-align:center;"
        />
        <div id="response-message" class="invalid-feedback">This is a success label</div>
      </div>
    </div>
  </div>
</template>

<script>
/* eslint-disable */
export default {
  name: 'NameDefinition',
  mounted() {

  },
}
</script>

<style>
  .container{
    height: 200px;
    background: #fff;
  }
</style>
