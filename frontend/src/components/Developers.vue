<template>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

            <h1>Enuygun Interview Task</h1>
            <div v-if="developers.length === 0" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>

            <div class="jumbotron" v-for="developer in developers" :key="developer.id">
                <h3 class="display-4"> {{ developer.name }} </h3>
                <hr class="my-4">
                <p class="lead">Seniority: {{developer.seniority}} , Estimated: {{developer.estimated}} ,
                    Tasks:{{developer.tasks.length}}</p>

                <table class="table">

                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Stimated</th>
                        <th scope="col">Level</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="task in developer.tasks" :key="task.id">
                        <th scope="row">{{task.id}}</th>
                        <td>{{task.title}}</td>
                        <td>{{task.stimated}}</td>
                        <td>{{task.level}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="col-1"></div>
    </div>
</template>

<script>
    export default {
        name: 'Developers',

        data() {
            return {
                developers: []
            }
        },

        methods: {
            getDevelopers() {
                this.axios.get("http://localhost:8000/api/developers").then((response) => {
                    this.developers = response.data;
                    console.log(response.data)
                })
            }
        },

        mounted: function () {
            this.getDevelopers();
        },

    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
