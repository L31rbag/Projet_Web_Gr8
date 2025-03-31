<template>
  <div class="container">
    <section class="slides" id="page1">
      <div id="leftSide">
        <Slide_Noire
          position="top"
          :height="60"
          color="black"
          
        >
        </Slide_Noire>
        <h1 id="title">Le Ziravene</h1>
       
        <h3 id="subTitle">Qui Sommes-Nous :</h3>
        <p id="infoRestau">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint minus veniam, illo rem eaque est illum repellendus porro quas cum a in recusandae quidem nobis? Veniam placeat pariatur odit?</p>
        <!-- a changer pour que l admin puisse le gerer depuis son interface-->
        <div class="cercleTexte">
          <Icone_Cercle 
            bgColor="000"
           
           
            image="/src/assets/image/enveloppe.png"
          />
          <a  href="#page1"><p class="texteIcon">Nous Contacter </p></a>
        </div>
        
        <div class="cercleTexte">
          <Icone_Cercle 
            bgColor="000"
            image="/src/assets/image/livre.png"
          />
          <a  href="#page3"><p class="texteIcon">Le Menu </p></a>
        </div>

        <div class="cercleTexte">
          <Icone_Cercle 
            bgColor="000"
            image="/src/assets/image/enveloppe.png"
          />
          <a  href="#page2"><p class="texteIcon">Réserver </p></a>
        </div>

        <Slide_Noire
          position="bottom"
          :height="60"
          color="black"
         
          Tcolor="white"
        >
          <template v-slot:gauche>Retrouvez nous sur :</template><!-- exemple des slots utilisé-->
          <template v-slot:centre><a href="https://www.instagram.com/"><Icone_Cercle image="/src/assets/image/insta.png"></Icone_Cercle></a></template>
          <template v-slot:droite><a href="https://www.tripadvisor.com/"><Icone_Cercle image="/src/assets/image/trip.png"></Icone_Cercle></a></template>
        </Slide_Noire>
      </div>
      
      <div id="rightSide"> 
        
        <video width="100%" autoplay loop muted>
          
          <source src="/src/assets/image/Test.mp4" type="video/mp4" />
        
          
        </video>
        
      </div>

    </section>
    <section class="slides" id="page2">
      <Slide_Noire
        position="top" 
        :height="60"
        color="black"
        
      > <!--exemple crea d un slide sans slot-->
      </Slide_Noire>
      
      
      <Formulaire>

      </Formulaire>


      <Slide_Noire
        position="bottom"
        :height="60"
        color="black"
        
        Tcolor="white"
      >
        
      </Slide_Noire>
      
      
    </section>

    <section class="slides" id="page3">
      <Slide_Noire
        position="top"
        :height="60"
        color="black"
       
      >
      </Slide_Noire>
      <Menu></Menu>


      
      <Slide_Noire
        position="bottom"
        :height="60"
        color="black"
        
        Tcolor="white"
      >
        
      </Slide_Noire>
    </section>
 
  

  </div>
</template>


<script setup>
import Icone_Cercle from './components/Icone_Cercle.vue';//les imports
  
import Slide_Noire from './components/Slide_Noire.vue';
import Formulaire from './components/Formulaire.vue';
import Menu from './components/Menu.vue';





</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.container {
  width: 100%;
 
 
  height: 100vh;
  font-family: 'Libre_BaskerVille';
  overflow-y: scroll;
  scroll-snap-type: y mandatory;
  overflow: auto;
  scrollbar-width: none;
  scroll-behavior: smooth;
}



.slides {
  background: linear-gradient(0.25turn, #ffc183, #C07F3E); /* le degradé*/
  width: 100%;
  height: 100vh;
  
  display: flex;
  scroll-snap-align: start;
  position: relative;
}

#page1 {
  display: flex;
  
  
  flex-direction: row; 
}




#leftSide {
  flex: 1;
  padding-right: 20px; 
}

#rightSide {
  flex: 0 0 600px; 
  
  
  margin-left: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 200px;
}

#title {
  margin-left: 20px;
  margin-top: 80px;
  font-size: 76px;
 
 
 
 
  font-weight: 600;
  max-width: 650px;
  padding: 10px;
}

#subTitle {
  margin-top: 20px;
  margin-left: 70px;
  font-style: italic;
  font-size: 36px;
  font-weight: 500;
  max-width: 650px;
}

#infoRestau {
  text-align: center;
  line-height: 1.5;
  max-width: 600px;
  margin-left: 100px;
  margin-top: 30px;
  padding: 10px;
}



.cercleTexte {
  margin-left: 60px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  gap: 20px;
}



.texteIcon {
  font-style: italic;
  text-decoration: underline #d98e04;
  text-underline-offset: 10%;
  font-size: 30px;
  font-weight: 650;
}

video {
  width: 100%;
  
  height: auto;
  border-radius: 10px;
 
}

a{
  text-decoration: none;
  
  
  border: none;
  color:black;
}

</style>

