<template>
  <div id="form-content" class="form-group">
    <div style="margin-top: 12px" v-if="forms.html.length == 0">
      <div class="spinner spinner-primary"></div>
    </div>
    <div class="addfield-btn">
      <button
        @click="fetchFieldForm"
        type="button"
        class="btn btn-primary mt-25"
        aria-label="Iceberg"
      >
        <i class="material-icons">add</i>
        Add field
      </button>
    </div>

    <div
      style="padding-top: 12px"
      v-for="[key, value] in forms.html"
      :key="key"
      v-html="value"
    ></div>
  </div>
</template>

<script>
/* eslint-disable */
import axios from "axios";
import { reactive } from "vue";
export default {
  setup(props) {
    const forms = reactive({ html: new Map() });
    var counter = 1;

    const fetchField = async (counter = 1) => {
      forms.html.set(counter,(await axios.get(`http://localhost:8079/modules/productextender/utils/form.php?c=${counter}`)).data)
    }

    const attachDeleteEvent = () => {
      return new Promise((resolve, reject) => {
        const delBtn = (document.getElementsByClassName('del-btn'));
        let btn = null;
        for(let i = 0; i < delBtn.length; i++){
          delBtn[i].addEventListener('click', (evt) => {
            evt.stopImmediatePropagation();
            if(evt.target.className == 'material-icons'){
              btn = evt.target.offsetParent;
            } else {
              btn = evt.target;
            }

            let btnId = parseInt(btn.getAttribute('data-id'));

            forms.html.delete(btnId);
          })
        }
        resolve();
      });
    }

    const attachTypeFieldEvent = () => {
      return new Promise((resolve, reject) => {
        const typeField = document.getElementsByClassName('select-field');
        for(let i = 0; i < typeField.length; i++){
          typeField[i].addEventListener('change', async (evt) => {
            evt.stopImmediatePropagation();
            let dt = evt.target.value;
            let dataid = evt.target.getAttribute('id').split('_')[2];
            let response = (await axios.get(`http://localhost:8079/modules/productextender/utils/length_form.php?dt=${dt}&did=${dataid}`)).data;

            document.getElementById(`specific_field_${dataid}`).insertAdjacentHTML('beforeend', response);
          })
        }
        resolve();
      })
    }

    return {
      forms,
      fetchField,
      attachDeleteEvent,
      attachTypeFieldEvent,
      counter
    };
  },

  async mounted() {
   await this.fetchField();
   await this.attachDeleteEvent();
   await this.attachTypeFieldEvent();
  },

  methods: {
    async fetchFieldForm(){
      this.counter += 1;
      await this.fetchField(this.counter);
      await this.attachDeleteEvent();
      await this.attachTypeFieldEvent();
    },


  },
};
</script>

<style>
.mt-25 {
  margin-top: 25px;
}

.addfield-btn{
  text-align: start;
  padding-left: 20px;
}

.del-btn {
  position: absolute;
  top: 30px;
}
</style>
