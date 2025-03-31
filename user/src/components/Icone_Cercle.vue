<template>
  <div class="circle" :style="circleStyle">
    <img v-if="image" :src="image" alt="icon" class="icon" />
    <i v-else :class="icon" class="icon"></i>
  </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
  size: { type: String, default: "80px" }, 
  
  
  bgColor: { type: String, default: "#000" }, 
  icon: { type: String, default: "fas fa-user" },
  image: { type: String, default: "" }
});

const circleStyle = computed(() => ({
  width: props.size, 
  height: props.size,
  
  backgroundColor: props.bgColor.startsWith("#") ? props.bgColor : `#${props.bgColor}`, //Si commence par # juste la couleur sinon rajout #
  borderRadius: "50%",
  display: "flex",
 
  alignItems: "center",
  justifyContent: "center",
  color: "white",
  fontSize: "24px",
  overflow: "hidden",
  
}));
</script>

<style scoped>
.circle {
  transition: all 0.3s ease-in-out;
}





.circle:hover {
  transform: scale(1.1);
}

.icon {
 
 
  width: 70%;
  height: 70%;
}
</style>
