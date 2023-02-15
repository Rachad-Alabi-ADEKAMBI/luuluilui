<template>
<!--show ads-->
            <button class='btn btn-primary' @click='displayAdd()'>
                        Utilisateurs
                    </button>

            <h1>
                Toutes les annonces
            </h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end show ads-->

            <!--show ads-->
            <h1>
                Toutes les utilisateurs
            </h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom et prénoms</th>
                            <th scope="col">Annonces</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end show ads-->
</template>

<script>
   export default {
  name: 'DashboardAdmin',
  props: {

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

    }
},
mounted: function() {
   this.getAllCars();
},
methods: {
    getAllCars() {
        axios.get('http://127.0.0.1/frankoo/api/allCars').then(response =>
            this.details = response.data)
          console.log('das')
          this.showAllCars = true;
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