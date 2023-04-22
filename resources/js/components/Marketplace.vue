<template>
    <div class="main" >
   <div class='buttons mt-3' v-if="showFilters">
    <select name="location" class="" id="" >
        <option value="all">Toutes les villes</option>
        <option value="Cotonou">Cotonou</option>
        <option value="Abomey-Calavi">Abomey-Calavi</option>
        <option value="Porto-Novo">Porto-Novo</option>
        <option value="Parakou">Parakou</option>
        <option value="Bohicon">Bohicon</option>
        <option value="Ouidah">Ouidah</option>
        <option value="Abomey">Abomey</option>
        <option value="Malanville">Malanville</option>
        <option value="Natitingou">Natitingou</option>
    </select>

    <input type="range" v-model="rangeValue" min="0" max="70000000" class="mr-2 ml-2">

       <button class="btn btn-primary"  @click='getAllCars()'>
           Tout voir
       </button>
       <button @click='getToSell()' class="btn btn-primary">
           A vendre
       </button>

       <button @click='getToRent()' class="btn btn-primary">
           A louer
       </button>

           <i class="bi bi-search mt-4 search-icon" @click="displaySearch()"></i>
   </div>

   <div class="mx-auto text-center search-field pt-3" v-if="showSearch">
        <input type="text" placeholder="Nom ou modèle" v-model="searchText">
       <i class="bi bi-x search-icon close-search fw-bold" @click="getAllCars()"></i>
   </div>

   <!--filtered-->
   <section class='section bg-light pt-2' v-if='showFiltered'>
       <h2 class="subtitle">
           TRI
       </h2>

       <div class="row">
               <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in filteredItems' :key='car.id'>
                   <div class="item mx-auto" @click='getCar(car.id)'>
                       <div class="item__top mb-0">
                           <img :src="getImgUrl(car.pic1)" class='' alt="">
                           <div class="info"> {{ format(car.price)}} XOF </div>
                           <div class="bar">
                               <p>{{  car.category }}</p>
                           </div>
                       </div>

                       <div class="item__middle">
                        <img :src="getImgUrl(car.pic2)" class='' alt=" vehicule à vendre ou à louer à cotonou">
                        <img :src="getImgUrl(car.pic3)" class='' alt=" vehicule à vendre ou à louer à au Benin">
                        <img :src="getImgUrl(car.pic4)" class='' alt=" vehicule à vendre ou à louer en Afrique de l'ouest">
                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <div class="list">
                            <div class="list__item">Modèle: <span> {{ car.brand_name }} </span></div>
                               <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                               <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
   </section>

   <section v-if="searchItems.length  == 0">
       <p class="text text-center mt-3"  >
                   Aucun résultat
               </p>
   </section>

   <section class='section bg-light pt-2' v-if="searchItems.length > 0 && showResults">
       <h2 class="subtitle">
           RESULTATS DE LA RECHERCHE
       </h2>


       <div class="container mt-3 ">
           <div class="row">
               <p class="text text-center">
                       Resultats pour <span>{{ searchText  }}</span>
                   </p> <br>



               <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in
                      searchItems' :key='car.id' v-if="searchItems.length > 0">

                   <div class="item mx-auto">
                       <div class="item__top">
                           <img :src="getImgUrl(car.pic1)" class='' alt="">
                           <div class="info"> {{ car.category }} </div>
                           <div class="bar">
                               <p></p>
                           </div>
                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p class="description">
                               {{ reduceString( car.description ) }}
                           </p>

                           <div class="list">
                               <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                               <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                               <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                           </div>

                           <p class="price">
                               {{ format(car.price)}} XOF
                           </p>

                           <button  class="btn btn-primary" @click='getCar(car.id)'>
                               Voir
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </section>


   <!--to sell-->
   <section class='section bg-light pt-2' v-if='showToSell'>
       <h2 class="subtitle">
           EN VENTE
       </h2>

       <div class="container mt-3 ">
           <div class="row">
               <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in details' :key='car.id'>
                   <div class="item mx-auto" @click='getCar(car.id)'>
                       <div class="item__top mb-0">
                           <img :src="getImgUrl(car.pic1)" class='' alt="">
                           <div class="info"> {{ format(car.price)}} XOF </div>
                           <div class="bar">
                               <p>{{  car.category }}</p>
                           </div>
                       </div>

                       <div class="item__middle">
                             <img :src="getImgUrl(car.pic3)" class=''
                             alt="vehicule à louer à au Benin" v-if="pic3 !=''">
                             <img src="" class=''
                             alt="vehicule à louer à au Benin" v-if="pic3 ==''">
                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p>
                            <span>{{ car.category }}</span>, à {{  car.location }}
                           </p>

                           <div class="list">
                            <div class="list__item">Moteur: <br><span> {{ car.brand_name }} </span></div>
                               <div class="list__item">Boite: <br><span> {{ car.box }} </span></div>
                               <div class="list__item">KIlométrage: <br><span> {{ format(car.kilometers) }} km </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </section>

   <!--to rent-->
   <section v-if='showToRent' class="mt-4 pt-2"  >
       <h2 class="subtitle">
           EN LOCATION
       </h2>

       <div class="container mt-3 ">
           <div class="row">
               <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in details' :key='car.id'>
                   <div class="item mx-auto" @click='getCar(car.id)'>
                       <div class="item__top mb-0">
                           <img :src="getImgUrl(car.pic1)" class='' alt="">
                           <div class="info"> {{ format(car.price)}} XOF </div>
                           <div class="bar">
                               <p>{{  car.category }}</p>
                           </div>
                       </div>

                       <div class="item__middle">
                        <img :src="getImgUrl(car.pic2)" class='' alt=" vehicule à vendre ou à louer à cotonou">
                        <img :src="getImgUrl(car.pic3)" class='' alt=" vehicule à vendre ou à louer à au Benin">
                        <img :src="getImgUrl(car.pic4)" class='' alt=" vehicule à vendre ou à louer en Afrique de l'ouest">
                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <div class="list">
                            <div class="list__item">Modèle: <span> {{ car.brand_name }} </span></div>
                               <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                               <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!--all -->
   <section class='section bg-light pt-2' v-if='showAllCars'>
       <h2 class="subtitle">
           TOUTES LES ANNONCES
       </h2>

       <div class="container mt-3 ">
           <div class="row">
               <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in details' :key='car.id'>
                   <div class="item mx-auto" @click='getCar(car.id)'>
                       <div class="item__top mb-0">
                           <img :src="getImgUrl(car.pic1)" class='' alt="">
                           <div class="info"> {{ format(car.price)}} XOF </div>
                           <div class="bar">
                               <p>{{  car.category }}</p>
                           </div>
                       </div>

                       <div class="item__middle">
                        <img :src="getImgUrl(car.pic2)" class='' alt=" vehicule à vendre ou à louer à cotonou">
                        <img :src="getImgUrl(car.pic3)" class='' alt=" vehicule à vendre ou à louer à au Benin">
                        <img :src="getImgUrl(car.pic4)" class='' alt=" vehicule à vendre ou à louer en Afrique de l'ouest">
                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <div class="list">
                            <div class="list__item">Modèle: <span> {{ car.brand_name }} </span></div>
                               <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                               <div class="list__item">Etat: <span> {{ car.rate }}/5 </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </section>
</div>
</template>

<script>
  export default {
 name: 'Marketplace',
 props: {
   msg: String
 },
 data() {
   return {
       cars: [],
       details:[],
       toRent: [],
       showCars : false,
       showAdd: false,
       showDelete: false,
       showEdit: false,
       showAllCars: false,
       showToRent: false,
       showToSell: false,
       showSearch: false,
       showFilters: false,
      /// showSearchResults: true,
       showFiltered: false,
       footerCars: [],
       searchText: '',
       rangeValue: '',
       showResults: false

   }
},
mounted: function() {
  this.getToSell();
},
computed: {
       filteredItems() {
        this.showFiltered = true;
        this.showToSell =false;
        this.showAllCars = false;
        alert('OK');
        this.showToRent = false;
        return this.details
       .filter((ad) => ad.price >= this.rangeValue)
       .sort((a, b) => b.price - a.price);

   },
   searchItems() {
                  return this.details.filter(detail => {
                   return detail.name.toLowerCase().includes(this.searchText.toLowerCase())
               })
           }
       },
methods: {
   displaySearch(){
            this.showAllCars = false;
           this.showToRent = false;
           this.showToSell = false;
           this.showFilters = false;
           this.showSearch = true;
   },


   closeSearch(){
       this.showFilters = true;
       this.showSearch = false;
       this.showAllCars = true;
       this.showResults = false;
       this.searchItems.length = 0;
   },

   getToSell(){
       axios.get('/carsToSellApi').then(response =>
           this.details = response.data);
           this.showAllCars = false;
           this.showToRent = false;
           this.showToSell = true;
           this.showFilters = true;
       this.showSearch = false;
       this.showResults = false;

   },
   getAllCars(){
       axios.get('/adsApi').then(response =>
           this.details = response.data);
           this.showCar = false;
           this.showAllCars = true;
           this.showToRent = false;
           this.showToSell = false;
           this.showFilters = true;
           this.showSearch = false;
   },
   getToRent(){
       axios.get('/carsToRentApi').then(response =>
           this.details = response.data);
           this.showAllCars = false;
           this.showToRent = true;
           this.showToSell = false;
   },
   getCar(id){
       window.location.replace('/adView/'+id);
    //  window.location.replace('https://127.0.0.1:8001/ad/'+id);
   },
   reduceString(str) {
    return str
 },

   format(num){
   let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
   return res;
},
   getImgUrl(pic) {
  // return "https://luuluilui.fr/public/img/ads/" + pic;
  return "https://127.0.0.1/luuluilui/public/img/ads/" + pic;
    },getSampleImg(){
       // return "https://127.0.0.1/luuluilui/public/img/ads/" + pic;
       return "https://127.0.0.1/luuluilui/public/img/ads/" + pic;
    }
}
}
</script>