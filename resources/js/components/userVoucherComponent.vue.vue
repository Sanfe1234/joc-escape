<template>
    <div class="container mt-5">
        <h2>Vouchers</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">% de descompte</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="voucher of vouchers">
                <th scope="row">
                    Voucher {{ voucher.id }}
                </th>
                <td>{{ voucher.discount }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            vouchers: [],
        }
    },
    methods: {
        getGame() {
            axios.get('/getVouchersFromUser').then((response) => {
                this.vouchers = response.data
            })
        }

    },
    mounted() {
        this.getGame();
    }
}
</script>
