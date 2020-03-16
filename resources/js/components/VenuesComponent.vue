<template>
    <div class="container vue">
        {{ venues }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('venues mounted.')
        },
        props: [
            'venues'
        ],
        created() {
            this.venues = JSON.parse(this.venues)
        }
    }
</script>
