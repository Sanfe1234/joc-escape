<template>
    <div class="container mt-5">
        <div class="card-deck">
            <div class="card" style="width: 100%">
                <img :src="joc[1].url" class="card-img-top mx-auto"
                     alt="..." style="width: 500px;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        {{ joc[0].name }}
                    </h5>
                    <h6>Preu: {{ joc[0].price }}€</h6>
                    <ul>
                        <li>Màxim de jugadors: {{ joc[0].max_players }}</li>
                        <li>Mínim de jugadors: {{ joc[0].min_players }}</li>
                    </ul>
                    <div v-if="joc[2]">
                        <a class="btn btn-primary" :href="'/joc/' + joc[0].id + '/reserva'">Reservar</a>
                    </div>
                    <div v-else>
                        Necessites <a href="/login-page">iniciar sessió</a> per reservar
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            joc: [],

        }
    },
    methods: {
        getGame() {
            axios.get('/getJoc/' + window.posts).then((response) => {
                this.joc = response.data
            })
        }

    },
    mounted() {
        this.getGame();
    }
}
</script>
