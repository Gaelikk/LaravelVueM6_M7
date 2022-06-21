<template>
    <div class="container">
        <h1 class="text-center my-5">Llista d'usuaris</h1>
        <table class="table table-dark table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Cognom</th>
                <th>Email</th>
                <th>Nom d'usuari</th>
                <th>Opcions<a class="btn btn-success float-lg-end" :href="`/users/create`">Crear Usuari</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <th>{{ user.id }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.surname }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.username }}</td>
                <td><a class="btn btn-primary" :href="`users/edit/${user.id}`">Edita</a>
                    <a class="btn btn-danger" @click="deleteUser(user.id)">Elimina</a>
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
            users: [],
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        async getUser() {
            await axios.get('/users/list')
                .then((response) => {
                    this.users = response.data.users
                })
        },
        deleteUser(id) {
            axios.delete(`api/user/${id}`)
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
