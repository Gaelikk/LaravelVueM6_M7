<template>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Nou Usuari</h2>
                <form @submit.prevent="addUser">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nom</label>
                            <input id="name" v-model="user.name" class="form-control" name="name" type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="surname">Cognom</label>
                            <input id="surname" v-model="user.surname" class="form-control" name="surname" type="text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input id="email" v-model="user.email" class="form-control" name="email" type="email">
                    </div>
                    <div class="mb-3">
                        <label for="username">Nom d'usuari</label>
                        <input class="form-control" id="username" name="username" type="text" v-model="user.username">
                    </div>
                    <div class="mb-3">
                        <label for="password">Contrasenya</label>
                        <input id="password" v-model="user.password" class="form-control" name="password"
                               type="password">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Registrar">
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
    methods: {
        async addUser() {
            if (this.user.name.trim() === '' || this.user.surname.trim() === '' || this.user.email.trim() === ''
                || this.user.username.trim() === '' || this.user.password.trim() === '') {
                alert('Completa tots els camps');
                return;
            }
            const params = {
                name: this.user.name,
                surname: this.user.surname,
                email: this.user.email,
                username: this.user.username,
                password: this.user.password,
            }

            console.log(params);
            axios.post('/api/user', params)
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
