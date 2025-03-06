const { createApp } = Vue

  createApp({

    data() {
      return {
        show: true,
        User: {  /* newReservation */
            name: "", /* date : ... */
            mdp: "" /* nom : ... */ /* etc */
        },
        users:[]  /* reservations :[]*/
      }
    },
    methods: {
    }
  
  }).mount('#app')