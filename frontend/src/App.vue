<template>
    <div id="app">
        <Developers></Developers>
    </div>
</template>

<script>

    import Developers from "./components/Developers";

    export default {
        components: {
            Developers
        },

        name: 'App',
    }
</script>

<style>
    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
