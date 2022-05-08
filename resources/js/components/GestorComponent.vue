<template>
    <div class="container mt-5">
        <div class="card-deck flex-wrap justify-content-center my-5">
            <div v-for="joc of jocs">
                <div class="card mb-3" style="width: 20vw; height: 350px;">
                    <img :src="joc[1].url" class="card-img-top"
                         alt="..." style="height: 200px; object-fit: cover">
                    <div class="card-body align-bottom d-flex flex-column justify-content-end">
                        <h5 class="card-title">
                            {{ joc[0].name }}
                        </h5>
                        <p>Total de reserves: {{ joc[2].length }}</p>
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
            jocs: [],
        }
    },
    methods: {

        getGames() {
            axios.get('/getAllJocs').then((response) => {
                this.jocs = response.data
            })
        },
    },
    mounted() {
        this.getGames();
    }
}
</script>
