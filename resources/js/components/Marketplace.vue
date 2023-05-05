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

            <input type="range" v-model="rangeValue" min="0" max="80000000" class="mr-2 ml-2" @click="getRange()">

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
            <i class="bi bi-x" @click="getAllCars()"></i>
        </div>

   <!--filtered-->
   <section v-if='showFiltered' class="mt-4 pt-2"  >
       <h2 class="subtitle">
           RESULTAS DU TRI
       </h2>

       <p class="text text-center">
        Tri pour <span> {{ format(rangeValue) }} XOF  </span>
       </p>

       <div class="container mt-3 ">
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
                        <img :src="car.pic2 != null ? getImgUrl(car.pic2) : getSampleImg()"
                                class=""
                                alt="vehicule à louer au Bénin">

                                <img :src="car.pic3 != null ? getImgUrl(car.pic3) : getSampleImg()"
                                class=""
                                alt="vehicule à vendre au Bénin">

                                <img :src="car.pic4 !== null ? getImgUrl(car.pic4) : getSampleImg()"
                                class=""
                                alt="parc automobile benin">

                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p>
                            <i class="bi bi-tag-fill"></i>  <span>{{ car.category }}</span>, <br>
                            <i class="bi bi-geo-alt-fill"></i> {{  car.location }}
                           </p>

                           <div class="list">
                            <div class="list__item">Moteur: <br>
                                <i class="bi bi-gear-wide-connected"></i>
                                  <span> {{ car.engine }} </span>
                            </div>
                               <div class="list__item"> Climatisation: <br>
                                <i class="fas fa-snowflake"></i>
                                <span> {{ car.air_conditionning }} </span></div>
                               <div class="list__item">Année: <br>
                                <i class="bi bi-calendar-fill fw-bold"></i>
                                <span> {{ car.year }} </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- end filtered-->

   <!--show resukts -->
   <section class="mt-4 pt-2" v-if="showResults" >
       <h2 class="subtitle">
           RESULTAS DE LA RECHERCHE
       </h2>

       <p class="text text-center">
        Resultas pour:  <span> {{ searchText  }}  </span>
       </p>


       <p class="text text-center" v-if="searchItems.length  == 0">
        Aucun résultat
       </p>

       <div class="container mt-3 " v-if="searchItems.length  > 0">
           <div class="row">
               <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in searchItems' :key='car.id'>
                <div class="item mx-auto" @click='getCar(car.id)'>
                       <div class="item__top mb-0">
                           <img :src="getImgUrl(car.pic1)" class='' alt="">
                           <div class="info"> {{ format(car.price)}} XOF </div>
                           <div class="bar">
                               <p>{{  car.category }}</p>
                           </div>
                       </div>

                       <div class="item__middle">
                        <img :src="car.pic2 != null ? getImgUrl(car.pic2) : getSampleImg()"
                                class=""
                                alt="vehicule à louer au Bénin">

                                <img :src="car.pic3 != null ? getImgUrl(car.pic3) : getSampleImg()"
                                class=""
                                alt="vehicule à vendre au Bénin">

                                <img :src="car.pic4 !== null ? getImgUrl(car.pic4) : getSampleImg()"
                                class=""
                                alt="parc automobile benin">

                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p>
                            <i class="bi bi-tag-fill"></i>  <span>{{ car.category }}</span>, <br>
                            <i class="bi bi-geo-alt-fill"></i> {{  car.location }}
                           </p>

                           <div class="list">
                            <div class="list__item">Moteur: <br>
                                <i class="bi bi-gear-wide-connected"></i>
                                  <span> {{ car.engine }} </span>
                            </div>
                               <div class="list__item"> Climatisation: <br>
                                <i class="fas fa-snowflake"></i>
                                <span> {{ car.air_conditionning }} </span></div>
                               <div class="list__item">Année: <br>
                                <i class="bi bi-calendar-fill fw-bold"></i>
                                <span> {{ car.year }} </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!--end results-->

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
                        <img :src="car.pic2 != null ? getImgUrl(car.pic2) : getSampleImg()"
                                class=""
                                alt="vehicule à louer au Bénin">

                                <img :src="car.pic3 != null ? getImgUrl(car.pic3) : getSampleImg()"
                                class=""
                                alt="vehicule à vendre au Bénin">

                                <img :src="car.pic4 !== null ? getImgUrl(car.pic4) : getSampleImg()"
                                class=""
                                alt="parc automobile benin">

                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p>
                            <i class="bi bi-tag-fill"></i>  <span>{{ car.category }}</span>, <br>
                            <i class="bi bi-geo-alt-fill"></i> {{  car.location }}
                           </p>

                           <div class="list">
                            <div class="list__item">Moteur: <br>
                                <i class="bi bi-gear-wide-connected"></i>
                                  <span> {{ car.engine }} </span>
                            </div>
                               <div class="list__item"> Climatisation: <br>
                                <i class="fas fa-snowflake"></i>
                                <span> {{ car.air_conditionning }} </span></div>
                               <div class="list__item">Année: <br>
                                <i class="bi bi-calendar-fill fw-bold"></i>
                                <span> {{ car.year }} </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </section>

   <!--to rent -->
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
                        <img :src="car.pic2 != null ? getImgUrl(car.pic2) : getSampleImg()"
                                class=""
                                alt="vehicule à louer au Bénin">

                                <img :src="car.pic3 != null ? getImgUrl(car.pic3) : getSampleImg()"
                                class=""
                                alt="vehicule à vendre au Bénin">

                                <img :src="car.pic4 !== null ? getImgUrl(car.pic4) : getSampleImg()"
                                class=""
                                alt="parc automobile benin">

                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p>
                            <i class="bi bi-tag-fill"></i>  <span>{{ car.category }}</span>, <br>
                            <i class="bi bi-geo-alt-fill"></i> {{  car.location }}
                           </p>

                           <div class="list">
                            <div class="list__item">Moteur: <br>
                                <i class="bi bi-gear-wide-connected"></i>
                                  <span> {{ car.engine }} </span>
                            </div>
                               <div class="list__item"> Climatisation: <br>
                                <i class="fas fa-snowflake"></i>
                                <span> {{ car.air_conditionning }} </span></div>
                               <div class="list__item">Année: <br>
                                <i class="bi bi-calendar-fill fw-bold"></i>
                                <span> {{ car.year }} </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!--end to rent-->

   <!--all-->
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
                        <img :src="car.pic2 != null ? getImgUrl(car.pic2) : getSampleImg()"
                                class=""
                                alt="vehicule à louer au Bénin">

                                <img :src="car.pic3 != null ? getImgUrl(car.pic3) : getSampleImg()"
                                class=""
                                alt="vehicule à vendre au Bénin">

                                <img :src="car.pic4 !== null ? getImgUrl(car.pic4) : getSampleImg()"
                                class=""
                                alt="parc automobile benin">

                       </div>

                       <div class="item__bottom">
                           <h3>
                               {{ car.name }}
                           </h3>

                           <p>
                            <i class="bi bi-tag-fill"></i>  <span>{{ car.category }}</span>, <br>
                            <i class="bi bi-geo-alt-fill"></i> {{  car.location }}
                           </p>

                           <div class="list">
                            <div class="list__item">Moteur: <br>
                                <i class="bi bi-gear-wide-connected"></i>
                                  <span> {{ car.engine }} </span>
                            </div>
                               <div class="list__item"> Climatisation: <br>
                                <i class="fas fa-snowflake"></i>
                                <span> {{ car.air_conditionning }} </span></div>
                               <div class="list__item">Année: <br>
                                <i class="bi bi-calendar-fill fw-bold"></i>
                                <span> {{ car.year }} </span></div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </section>
   <!-- end all-->
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
  return this.details.filter(detail => {
    return detail.price >= this.rangeValue;
  });
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
           this.showFiltered = false;
           this.showResults = true;
   },
   getRange(){
    this.showAllCars = false;
        this.showToRent = false;
        this.showToSell = false;
        this.showResults = false;
        this.showFiltered = true;
   },
   closeSearch(){
       this.showFilters = true;
       this.showSearch = false;
       this.showAllCars = true;
       this.showResults = false;
       this.showFiltered = false;
   },

   getToSell(){
       axios.get('/carsToSellApi').then(response =>
           this.details = response.data);
           this.showAllCars = false;
           this.showToRent = false;
           this.showToSell = true;
           this.showFilters = true;
       this.showSearch = false;
       this.showFiltered = false;
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
           this.showFiltered = false;
           this.showResults = false;
   },
   getToRent(){
       axios.get('/carsToRentApi').then(response =>
           this.details = response.data);
           this.showAllCars = false;
           this.showToRent = true;
           this.showToSell = false;
           this.showFiltered = false;
           this.showResults = false;
   },
   getCar(id){
       window.location.replace('/adView/' +id);
   },
   reduceString(str) {
    return str
 },

   format(num){
   let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
   return res;
},
   getImgUrl(pic) {
  return "/img/ads/" + pic;
    },getSampleImg(){
       return "/img/ads/pic.jpg";
    }
}
}
</script>