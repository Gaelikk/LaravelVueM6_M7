<template>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Edita Joc</h2>
                <form @submit.prevent="editGame">
                    <div class="mb-3">
                        <label for="name">Nom</label>
                        <input id="name" class="form-control" name="name" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="organization">Organització</label>
                        <input class="form-control" type="text" id="organization" name="organization">
                    </div>
                    <div class="mb-3">
                        <label for="image">URL Imatge</label>
                        <input class="form-control" type="text" id="image" name="image">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Guardar Canvis">
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
    mounted() {
        this.getGame()
    },
    methods: {
        async getGame() {
            this.axios.get(`/games/list/${this.$route.params.id}`)
                .then(response => {
                    const {name, organization, image} = response.data
                    this.game.name = name
                    this.game.organization = organization
                    this.game.image = image
                })
                .catch(err=>{
                    console.log(err)
                })
        },
        async editGame(){
            await this.axios.put(`/games/list/${this.$route.params.id}`, this.game)
                .then(res=>{
                    this.$router.push({
                        name:"getGame"
                    })
                })
                .catch(err=>{
                    console.log(err)
                })
        }
    }
}
</script>

<style scoped>

</style>
