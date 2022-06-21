<template>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Edita Usuari</h2>
                <form @submit.prevent="updateUser">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name">Nom</label>
                            <input class="form-control" id="name" name="name" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="surname">Cognom</label>
                            <input class="form-control " id="surname" name="surname" type="text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input autocomplete="email" class="form-control" id="email" name="email" type="email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username">Nom d'usuari</label>
                        <input autocomplete="username" class="form-control" id="username" name="username" type="text">
                    </div>
                    <input class="btn btn-success" type="submit" value="Guardar canvis">
                    <a class="btn btn-danger" :href="`/users`" type="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users: [],
            user: {id: '', name: '', surname: '', email: '', username: '', password: ''}
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        async getUser() {
            this.axios.get(`/users/list/${this.$route.params.id}`)
                .then(response => {
                    const {name, surname, email, username, password} = response.data
                    this.game.name = name
                    this.game.surname = surname
                    this.game.email = email
                    this.game.username = username
                    this.game.password = password
                })
                .catch(err => {
                    console.log(err)
                })
        },
        async updateUser() {
            await this.axios.put(`/users/list/${this.$route.params.id}`, this.game)
                .then(res => {
                    this.$router.push({
                        name: "getUser"
                    })
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>

