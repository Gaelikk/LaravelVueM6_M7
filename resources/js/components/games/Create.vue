<template>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Nou Joc</h2>
                <form @submit.prevent="createGame">
                    <div class="mb-3">
                        <label for="name">Nom</label>
                        <input id="name" v-model="game.name" class="form-control" name="name" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="organization">Organització</label>
                        <input id="organization" v-model="game.organization" class="form-control" name="organization"
                               type="text">

                        <label for="image">URL Imatge</label>
                        <input id="image" v-model="game.image" class="form-control" name="image" type="text"
                               value="https://static2.abc.es/media/espana/2019/04/19/escape-room-kNzB--620x349@abc.jpg">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Guardar">
                    <a class="btn btn-danger" :href="`/games`" type="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            games: [],
            game: {id: '', name: '', organization: '', image: ''}
        }
    },
    methods: {
        async createGame() {
            axios.post('/api/game', this.game)
                .then(res => {
                    console.log(res)
                    this.games.push({
                        name:'getGame'
                    })
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>
