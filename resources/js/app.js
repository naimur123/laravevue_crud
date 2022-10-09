// import './bootstrap';
import { createApp } from 'vue';
import StudentList from './components/StudentList.vue'

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

// const app = createApp();

// import ExampleComponent from './components/ExampleComponent.vue';

// app.component('checklist-component', CheckComponent);
createApp(StudentList).mount('#app');
// app.mount('#app');
