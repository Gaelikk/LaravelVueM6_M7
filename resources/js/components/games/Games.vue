<template>
    <div class="container">
        <h1 class="text-center my-5">Llista de jocs</h1>
        <table class="table table-dark table-bordered">
            <thead>
            <tr>
                <th>Número</th>
                <th>Nom</th>
                <th>Organització</th>
                <th>Opcions<a class="btn btn-success float-lg-end" :href="`/games/create`">Crear Joc</a></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="game in games" :key="game.id">
                <td>{{ game.id }}</td>
                <td>{{ game.name }}</td>
                <td>{{ game.organization }}</td>
                <td>
                    <a class="btn btn-primary" :href="`/games/edit/${game.id}`">Edita</a>
                    <a class="btn btn-danger" @click="deleteGame(game.id)">Elimina</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            games: [],
        }
    },
    mounted() {
        this.getGame()
    },
    methods: {
        async getGame() {
            await axios.get('/games/list')
                .then((response) => {
                    this.games = response.data.games
                })
        },
        deleteGame(id) {
            axios.delete(`api/game/${id}`)
                .then(res => {
                    console.log(res)
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>
