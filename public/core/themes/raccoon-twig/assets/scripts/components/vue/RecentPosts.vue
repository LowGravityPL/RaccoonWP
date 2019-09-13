<template>
    <div class="recent-posts-component">
        <div class="error" v-if="errored">Sorry, we weren't able to fetch recent posts.</div>
        <template v-else>
            <div class="loading" v-if="loading">Loading...</div>
            <template v-else>
                <h2>Recent posts:</h2>
                <div class="recent-posts-list">
                    <div
                        class="post post-card"
                        v-for="post in posts"
                        v-bind:key="post.slug"
                    >
                        <a
                            class="post-thumbnail"
                            v-bind:href="post.link"
                            v-if="post._embedded['wp:featuredmedia']"
                        >
                            <div
                                class="post-thumbnail-image"
                                v-bind:style="`background-image: url(${ post._embedded['wp:featuredmedia'][0].media_details.sizes.medium.source_url }})`"
                            ></div>
                        </a>
                        <div
                            class="post-content"
                        >
                            <header>
                                <div
                                    class="post-category"
                                    v-if="post._embedded['wp:term'][0][0]"
                                    v-html="post._embedded['wp:term'][0][0].name"
                                ></div>
                                <a
                                    v-bind:href="post.link"
                                >
                                    <h2
                                        class="post-title"
                                        v-html="post.title.rendered"
                                    ></h2>
                                </a>
                            </header>
                            <section
                                class="post-excerpt"
                                v-html="post.excerpt.rendered"
                            ></section>
                            <footer
                                v-if="post._embedded.author[0]"
                            >
                                Written by
                                <a
                                    v-bind:href="post._embedded.author[0].link"
                                    v-html="post._embedded.author[0].name"
                                ></a>
                            </footer>
                        </div>
                    </div>
                </div>
        </template>
        </template>
    </div>
</template>

<script>
import axios from 'axios';
import $ from 'jquery';

const wpPostsEndpoint = `${window.location.protocol}//${window.location.host}/wp-json/wp/v2/posts`;
const postsCount      = 3;
const $excludedPostID = $('article').data('excluded-id');
const requestURL      = `${wpPostsEndpoint}?_embed&per_page=${postsCount}&exclude=${$excludedPostID}`;

export default {
    name: 'RecentPosts',
    data() {
        return {
            posts: [],
            errored: false,
            loading: true,
        }
    },
    mounted() {
        axios
            .get(requestURL)
            .then(response => {
                this.posts = response.data;
                this.loading = false;
            })
            .catch(error => {
                console.error(error);
                this.errored = true;
                this.loading = false;
            })
    }
}
</script>

<style lang="scss">
.recent-posts-component > h2 {
    text-transform: uppercase;
}

.recent-posts-list {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    list-style: none;

    @media(max-width: 783px) {
        flex-direction: column;
    }
}
</style>
