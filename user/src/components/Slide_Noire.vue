<template>
  <div class="bande_noire" :style="bandeStyle">
    <div class="gauche"><slot name="gauche"></slot></div>
    <div class="centre"><slot name="centre"></slot></div>
    <div class="droite"><slot name="droite"></slot></div> <!--les slots qu on peut modif -->
  </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  //on peut changer la position top ou bottom uniquement / la height / la couleur / et la couleur du texte
  //de plus en rajoutant des template lors de l utilisation on peut rajouter trois composant a droite centre et gauche
  position: {
    type: String,
    default: 'top',
    
  },
  height: {
    type: Number,
    default: 80
  },
  color: {
    type: String,
    default: 'black'
  },
 
  Tcolor: {
    type: String,
    default: 'black'
  }
});


const bandeStyle = computed(() => { 
  return {
    position: 'absolute',
    [props.position]: '0',
    left: '0',
    width: '100%',
    height: `${props.height}px`,
    backgroundColor: props.color,
    
    color: props.Tcolor,
    
  };
});
</script>

<style scoped>
.bande_noire {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
  
}

.gauche, .centre, .droite {
  display: flex;
  align-items: center;
}

.gauche {
  justify-content: flex-start;
}

.centre {
  justify-content: center;
}

.droite {
  justify-content: flex-end;
}
</style>
