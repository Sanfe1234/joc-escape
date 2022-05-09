<template>
    <div class="container mt-5">
        <h2>Reserves</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Joc</th>
                <th scope="col">Sala</th>
                <th scope="col">Data de reserva</th>
                <th scope="col">Validat?</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="reserva of reserves">
                <th scope="row">
                    {{ reserva[0].id }}
                </th>
                <td>{{ reserva[1] }}</td>
                <td>{{ reserva[2] }}</td>
                <td>{{ reserva[0].data_reserva }}</td>
                <td v-if="reserva[0].validat === 0">No</td>
                <td v-else>Si</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            reserves: [],
        }
    },
    methods: {
        getGame() {
            axios.get('/getReservesFromUser').then((response) => {
                this.reserves = response.data
            })
        }

    },
    mounted() {
        this.getGame();
    }
}
</script>
