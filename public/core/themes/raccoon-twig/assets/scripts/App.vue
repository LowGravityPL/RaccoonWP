<template>
    <section id="vue-example" class="recent-posts-wrapper">
        <RecentPosts />
    </section>
</template>

<script>
import RecentPosts from './components/vue/RecentPosts.vue'

export default {
    name: 'vue-example',
    components: {
        RecentPosts
    },
}
</script>
