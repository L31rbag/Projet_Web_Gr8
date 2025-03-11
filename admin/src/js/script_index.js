const { createApp } = Vue

  createApp({

    data() {
      return {  
        newRes: {
            nom: "",
            tel: "",
            mail: "",
            nb_pers: "",
            date: "",
            nb_enf: "",
            num_table: ""
        },
        ress: [
          {
            nom: "boom",
            tel: "06 35 66 96 55",
            mail: "boom@gmail.com",
            nb_pers: "6",
            date: "10/03/2025",
            nb_enf: "3",
            num_table: "1"
          },
          {
            nom: "bim",
            tel: "06 55 38 74 59",
            mail: "bim@gmail.com",
            nb_pers: "4",
            date: "11/03/2025",
            nb_enf: "0",
            num_table: "2"
          },      
        ]
      }
    },
    methods: {
      add: function() {
        this.ress.push(this.newRes)
        this.newRes = {
            nom: "",
            tel: "",
            mail: "",
            nb_pers: "",
            date: "",
            nb_enf: "",
            num_table: ""
        }
      }
    }
  
  }).mount('#rdv')

