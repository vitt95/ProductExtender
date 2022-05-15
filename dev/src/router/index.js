/* eslint-disable */

import { createRouter, createWebHashHistory } from 'vue-router';
import { defineAsyncComponent } from 'vue';

const routes = [
  { path: '/definition-name', component: defineAsyncComponent(() => import('../pages/Index.vue'))},
  { path: '/field-definition', component: defineAsyncComponent(() => import('../components/FieldDefinition.vue'))}
];

const router = createRouter({
  history: createWebHashHistory(),
  routes: routes
});

export default router;
