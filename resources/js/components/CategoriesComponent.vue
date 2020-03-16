<template>
    <div class="container vue">
        <ul>
            <li v-for="(item, index) in categories">
                <a v-bind:href="`?category_id=${item.id}`">{{ item.name }}</a>
                <categories-component v-if="hasChildren(item)" :categories="item.categories" />
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'categories'
        ],
        created() {
            this.categories = JSON.parse(this.categories)
        },
        methods: {
            hasChildren(item) {
                return (Array.isArray(item.categories) && item.categories.length);
            }
        }
    }
</script>
