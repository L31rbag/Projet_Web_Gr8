const { createApp } = Vue

createApp({
  data() {
    return {
      nombre: "",
    };
  },

  computed: {
  },

  methods:{  
  }

}).mount('#app')

function getDateDuJour() {
  const ajd = new Date();
  const annee = ajd.getFullYear();
  const mois = String(ajd.getMonth() + 1).padStart(2, '0'); // Mois sur 2 chiffres
  const jour = String(ajd.getDate()).padStart(2, '0'); // Jour sur 2 chiffres
  return `${annee}-${mois}-${jour}`; // Format AAAA-MM-JJ
};

const InputDate = document.getElementById('date');
const date = getDateDuJour();
InputDate.value = date;
InputDate.min = date;