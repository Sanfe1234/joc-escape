<template>
    <div class="container mt-5">
        <b-carousel
            id="carousel-1"
            v-model="slide"
            :interval="4000"
            controls
            indicators
            background="#ababab"
            img-width="1024"
            img-height="480"
            style="text-shadow: 1px 1px 2px #333;"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
        >
            <!-- Text slides with image -->
            <b-carousel-slide
                v-for="joc of featured"
                :caption="joc[0].name"
                :img-src="joc[1].url"
                :key="joc[0].id"
            >
                <a :href="'jocs/' + joc[0].id " class="btn btn-primary">Més informació</a>
            </b-carousel-slide>
        </b-carousel>

        <div class="card-deck flex-wrap justify-content-center my-5">
            <div v-for="joc of jocs">
                <div class="card mb-3" style="width: 20vw; height: 350px;">
                    <img :src="joc[1].url" class="card-img-top"
                         alt="..." style="height: 200px; object-fit: cover">
                    <div class="card-body align-bottom d-flex flex-column justify-content-end">
                        <h5 class="card-title">
                            {{ joc[0].name }}
                        </h5>
                        <a :href="'jocs/' + joc[0].id " class="btn btn-primary">Veure</a>
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
            featured: [],
            slide: 0,
            sliding: null
        }
    },
    methods: {

        getAllGames() {
            axios.get('/getAllJocs').then((response) => {
                this.jocs = response.data.splice(3)
                this.featured = response.data.splice(0, 3)
            })
        },

        onSlideStart(slide) {
            this.sliding = true
        },
        onSlideEnd(slide) {
            this.sliding = false
        }

    },
    mounted() {
        this.getAllGames();
    }
}
</script>
