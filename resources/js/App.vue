<template>
     <div class="main" >
    <div class='buttons'>
        <button class="btn btn-primary"  @click='getAllCars()'>
            Tout voir
        </button>
        <button @click='getToSell()' class="btn btn-primary">
            A vendre
        </button>

        <button @click='getToRent()' class="btn btn-primary">
            A louer
        </button>
    </div>

    <section class='section bg-light' v-if='showToSell'>
        <h2>
            Véhicules à vendre
        </h2>

        <div class="container ">
            <div class="row">

                <div class="col-md-12 col-lg-4 mx-auto text-center" v-for='car in details' :key='car.id'>
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
                                {{ car.description }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.year }} </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ car.price}} F CFA
                            </p>

                            <button @click='getCar(car.id)'>
                                Voir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section v-if='showToRent'>
        <h2>
            Véhicules à louer
        </h2>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4" v-for='car in details' :key='car.id'>
                    <div class="item">
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
                                {{ car.description }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.year }} </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ car.price}} F CFA
                            </p>

                            <button @click='getCar(car.id)'>
                                Voir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section v-if='showAllCars'>
        <h2>
            Tous les véhicules
        </h2>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4" v-for='car in details' :key='car.id'>
                    <div class="item">
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
                                {{ car.description }}
                            </p>

                            <div class="list">
                                <div class="list__item">Annee: <span> {{ car.year }} </span></div>
                                <div class="list__item">Etat: <span> {{ car.year }} </span></div>
                                <div class="list__item">Couleur: <span> {{ car.color }} </span></div>
                            </div>

                            <p class="price">
                                {{ car.price}} F CFA
                            </p>

                            <button @click='getCar(car.id)'>
                                Voir
                            </button>
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
  name: 'App',
  props: {
    msg: String
  },
  data() {
    return {
        cars: [],
        details:[],
        showCars : false,
        showAdd: false,
        showDelete: false,
        showEdit: false,
        showAllCars: false,
        showToRent: false,
        showToSell: false,
        footerCars: []

    }
},
mounted: function() {
   this.getToSell();
},
methods: {

    displayAdd(){
        this.showBtn = false;
        this.showCars = false;
        this.showAdd = true
    },

    getAllCars() {
        axios.get('http://127.0.0.1/frankoo/api/allCars').then(response =>
            this.details = response.data)
            this.showAllCars = true;
            this.showToRent = false;
            this.showToSell =false
    },
    getToSell(){
        axios.get('http://127.0.0.1/frankoo/api/carsToSell').then(response =>
            this.details = response.data);
            this.showHome = false;
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = false;
            this.showToSell = true;
    },
    getToRent(){
        axios.get('http://127.0.0.1/frankoo/api/carsToRent').then(response =>
            this.details = response.data);
            this.showHome = false;
            this.showCar = false;
            this.showAllCars = false;
            this.showToRent = true;
            this.showToSell = false;
    },

    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "http://127.0.0.1/frankoo/assets/img/" + pic;
},
}
}
</script>