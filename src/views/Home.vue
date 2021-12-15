<template>
  <div class="home">
    <ModalSubscribeChild />
    <h1>URGENCE PARENTALE :</h1>
    <p class="">
      Visites aide parentales à domicile <br />
      consultations <br />
      téléconsultations <br />
      24h/24, 7j/7 <br />
      (Paris 75, 92, 93, 94)
    </p>
    <div class="textintro">
      <md-button class="md-raised md-primary"
        >Demander une visite a domicile</md-button
      >
      <md-button class="md-raised md-primary"
        >Prendre un RDV de consultation</md-button
      >
      <md-button class="md-raised md-primary"
        >Prendre un RDV de téléconsultation</md-button
      >
    </div>

    <md-content class="md-primary toto">
      <h2>
        SOS URGENCE PARENTALE : <br />
        Visites médicales à domicile <br />
        (Paris 75, 92, 93, 94)
      </h2>
      <p>
        Proposant une prise en charge des urgences médicales et des soins de
        médecine générale non programmés, 7j/7 et 24h/24 à Paris (75) ainsi que
        dans la plupart des communes des départements suivants :
        Seine-Saint-Denis (93), Hauts-de-Seine (92) et Val-de-Marne (94), SOS
        Médecins assure les visites de médecine générale, d’urgence, de
        permanence et de continuité des soins, à votre domicile, sur votre lieu
        de travail ou encore en l’absence de votre médecin traitant. Dès la
        réception de votre appel ou de votre demande de visite médicale à
        domicile SOS Médecins via notre interface Internet, nos équipes vous
        conseillent et vous accompagnent dans les meilleures conditions, pendant
        que vous attendez l’arrivée du médecin urgentiste. Pour toute demande,
        contactez-nous
      </p>

      <h2>Exempl de call API</h2>
      <div id="app" style="color: white">
        {{ info }}
      </div>
    </md-content>
  </div>
</template>

<script>
// @ is an alias to /src
import ModalSubscribeChild from "@/components/ModalSubscribeChild.vue";

// Pour récupérer le back
import axios from "axios";

export default {
  name: "Home",
  components: {
    ModalSubscribeChild,
  },
  el: "#app",
  data() {
    return {
      info: null,
    };
  },
  mounted() {
    axios
      .get("https://127.0.0.1:8000/api/posts?page=1")
      .then((response) => (this.info = response.data));
  },
};
</script>

<style scoped>
.md-layout-item {
  height: 40px;
}

.textintro {
  margin-bottom: 5%;
}

.toto {
  background-color: #203f97 !important;
  padding: 5%;
}
</style>
