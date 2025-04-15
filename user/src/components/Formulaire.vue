<template>
    <div class="formulaire-container">
      <h2 class="form-titre">Réservation</h2>
      <p class="form-soustitre">Réservez votre table au Ziravene</p>
      
      <form @submit.prevent="submitForm" method="POST" action="./../ajout_resa.php">
        <div class="form-ligne">
          <div class="form-g">
            <label for="nom" class="demande">Nom :</label>
            <input v-model="form.nom" id="nom" type="text" name="nom" class="input" required />
          </div>
          
          
        </div>
        
        <div class="form-ligne">
          <div class="form-g">
            <label for="telephone" class="demande">Téléphone :</label>
            <input v-model="form.telephone" id="telephone" name="telephone" type="tel" class="input" required />
          </div>
          
          <div class="form-g">
            <label for="email" class="demande">Email :</label>
            <input v-model="form.email" id="email" type="email" name="email" class="input" required />
          </div>
        </div>
        
        <div class="form-ligne">
          <div class="form-g">
            <label for="personne" class="demande">Nombre de personnes :</label>
            <input v-model="form.personne" id="personne" type="number" name="nbPersonne" min="1" max="8" class="input" required />
          </div>
          
          <div class="form-g">
            <label for="date" class="demande">Date :</label>
            <input v-model="form.date" id="date" type="date" class="input" name="date" required />
          </div>
        </div>
        
        <div class="form-ligne">
          <div class="form-g ">
            <label for="heure" class="demande">Heure :</label>
            <select v-model="form.heure" id="heure" class="input"name="date" required>
              <option value="" disabled selected>Choisir une heure</option>
              <option v-for="heure in heuresDisponibles" :key="heure" :value="heure">
                {{ heure }}
              </option>
            </select>
          </div>
        </div>
        
        <div class="form-ligne">
          <div class="form-g ">
            <label for="message" class="demande">Message (optionnel) :</label>
            <textarea v-model="form.message" id="message" class="input textarea" name="message" lignes="2"></textarea><!--double class-->
          </div>
        </div>
        
        <button type="submit" class="resa">Réserver</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { reactive, ref } from 'vue';
  
  const heuresDisponibles = [
    'MIDI', 'SOIR'
  ];
  
  const form = reactive({
    nom: '',
    
    telephone: '',
    email: '',
    personne: 1,
    date: '',
    heure: '',
    message: ''
  });
  
  const submitForm = () => {
    
    console.log('Formulaire soumis:', form);
    
    
   
  };
  </script>
  
  <style scoped>
  .formulaire-container {
    max-width: 650px;
    margin: 80px auto 70px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    position: relative;
    z-index: 10;
    font-size: 14px;
  }
  
  .form-titre {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 5px;
    text-align: center;
    color: #000;
  }
  
  .form-soustitre {
    font-size: 16px;
    font-style: italic;
    margin-bottom: 20px;
    text-align: center;
    color: #C07F3E;
  }
  
  .form-ligne {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
  }
  
  .form-g {
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  
 
  
  .demande {
    font-size: 16px;
    margin-bottom: 5px;
    font-weight: 500;
  }
  
  .input {
    padding: 8px 10px;
    border: 2px solid #C07F3E;
    border-radius: 8px;
    font-size: 14px;
    background-color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
  }
  
  
  
  .textarea {
    resize: vertical;
    min-height: 50px;
  }
  
  .resa {
    display: block;
    width: 160px;
    margin: 20px auto 0;
    padding: 10px;
    background-color: #000;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .resa:hover {
    background-color: #C07F3E;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }
  
 
  </style>