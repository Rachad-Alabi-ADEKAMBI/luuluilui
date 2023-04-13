


<div class="list">
                                <div class="" v-if="filteredItems.length != 0">
                                    <h3 class="text-center">Nom et prenoms</h3>
                                    <ul>
                                        <li v-for="ad in filteredItems" :key="ad.id">
                                            {{ ad.id }}
                                        </li>
                                    </ul>

                                </div>



                                <div class="" v-if='filteredItems.length === 0'>
                                    <p class="text-center pt-5 mt-5">
                                        Aucun résultat
                                    </p>
                                </div>
                </div>