<template>
    <div class="menu-container">
      <h2 class="menu-title">Menu</h2>
      
      <div class="menu-content">
        <div class="menu-section">
          <h3 class="menu-section-title">ENTRÉES</h3>
          <div class="menu-items">
            <div v-if="entrees.length > 0">
              <div v-for="(item, index) in entrees" :key="'entree-'+index" class="menu-item">
                <div class="menu-item-header">
                  <h4 class="menu-item-name">{{ item.name }}</h4>
                  <span class="menu-item-price">{{ item.price }}€</span>
                </div>
                <p class="menu-item-description">{{ item.description }}</p>
              </div>
            </div>
            <p v-else class="menu-empty">Les entrées seront bientôt disponibles.</p>
          </div>
        </div>
        
        <div class="menu-section">
          <h3 class="menu-section-title">PLATS PRINCIPAUX</h3>
          <div class="menu-items">
            <div v-if="plats.length > 0">
              <div v-for="(item, index) in plats" :key="'plat-'+index" class="menu-item">
                <div class="menu-item-header">
                  <h4 class="menu-item-name">{{ item.name }}</h4>
                  <span class="menu-item-price">{{ item.price }}€</span>
                </div>
                <p class="menu-item-description">{{ item.description }}</p>
              </div>
            </div>
            <p v-else class="menu-empty">Les plats seront bientôt disponibles.</p>
          </div>
        </div>
        
        <div class="menu-section">
          <h3 class="menu-section-title">DESSERTS</h3>
          <div class="menu-items">
            <div v-if="desserts.length > 0">
              <div v-for="(item, index) in desserts" :key="'dessert-'+index" class="menu-item">
                <div class="menu-item-header">
                  <h4 class="menu-item-name">{{ item.name }}</h4>
                  <span class="menu-item-price">{{ item.price }}€</span>
                </div>
                <p class="menu-item-description">{{ item.description }}</p>
              </div>
            </div>
            <p v-else class="menu-empty">Les desserts seront bientôt disponibles.</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const entrees = ref([
    {
      name: "Salade Méditerranéenne",
      price: "12",
      description: "Mélange de légumes frais, olives, feta et vinaigrette au citron."
    },
    {
      name: "Carpaccio de Bœuf",
      price: "15",
      description: "Fines tranches de bœuf, copeaux de parmesan, roquette et huile d'olive."
    }
  ]);
  
  const plats = ref([
    {
      name: "Suprême de Volaille",
      price: "24",
      description: "Suprême de volaille rôti, pommes de terre confites et sauce aux herbes."
    },
    {
      name: "Risotto aux Champignons",
      price: "22",
      description: "Risotto crémeux aux champignons sauvages et parmesan."
    }
  ]);
  
  const desserts = ref([
    {
      name: "Crème Brûlée",
      price: "9",
      description: "Crème vanillée caramélisée à la flamme."
    },
    {
      name: "Tarte au Citron Meringuée",
      price: "10",
      description: "Tarte au citron traditionnelle, meringue légère."
    }
  ]);
  
  
  </script>
  
  <style scoped>
  .menu-container {
    width: 85%;
    max-width: 1000px;
    margin: 80px auto 0;
    padding: 30px;
    background-color: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    
    font-family: 'Libre_BaskerVille', serif;
    height: auto;
  }
  
  .menu-title {
    text-align: center;
    font-size: 46px;
    font-weight: 600;
    margin-bottom: 25px;
    color: #000;
  }
  
  
  
  .menu-section {
    margin-bottom: 25px;
  }
  
  .menu-section-title {
    font-size: 28px;
    font-weight: 500;
   
    font-style: italic;
    margin-bottom: 15px;
    text-align: center;
    position: relative;
    color: #000;
  }
  
    
  
 
  
  
  
  .menu-item-header {
    display: flex;
    justify-content: space-between;
    
    margin-bottom: 3px;
  }
  
  .menu-item-name {
    font-size: 20px;
    font-weight: 600;
    color: #000;
    margin: 0;
  }
  
  .menu-item-price {
    font-size: 18px;
    font-weight: 500;
    color: #000;
  }
  
  .menu-item-description {
    font-size: 14px;
    line-height: 1.4;
    color: #333;
    font-style: italic;
  }
  
  
  
 
  </style>