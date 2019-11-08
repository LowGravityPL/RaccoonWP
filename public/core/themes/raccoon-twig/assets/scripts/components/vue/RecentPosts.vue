<template>
    <div class="recent-posts-wrapper">
        <div class="recent-posts-component">
            <div class="error" v-if="hasError">Sorry, we weren't able to fetch recent posts.</div>
            <template v-else>
                <div class="loading" v-if="isLoading">Loading...</div>
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
                                v-if="getFeaturedMediaSourceUrl(post)"
                            >
                                <div
                                    class="post-thumbnail-image"
                                    v-bind:style="`background-image: url(${ getFeaturedMediaSourceUrl(post) })`"
                                ></div>
                            </a>
                            <div
                                class="post-content"
                            >
                                <header>
                                    <div
                                        class="post-category"
                                        v-if="getTerm(post)"
                                        v-html="getTerm(post)"
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
                                    v-if="getAuthor(post)"
                                >Written by <a
                                        v-bind:href="getAuthor(post).link"
                                        v-html="getAuthor(post).name"
                                    ></a>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <button
                        v-if="hasMorePosts"
                        v-on:click="loadOlderPosts"
                    >Load older posts</button>
                </template>
            </template>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    const wpPostsEndpoint = `${window.location.protocol}//${window.location.host}/wp-json/wp/v2/posts`;
    const requestURL      = `${wpPostsEndpoint}?_embed`;

    export default {
        name: 'RecentPosts',
        data() {
            return {
                posts:   [],
                hasError: false,
                isLoading: true,
                hasMorePosts: true,
                currentPage: 1,
            }
        },
        props: {
            excludedPostId: Number,
            postsPerPage: {
                type: Number,
                default: 3
            }
        },
        methods: {
            loadOlderPosts() {
                this.currentPage += 1;
                this.getPostsFromPage();
            },
            getPostsFromPage() {
                let requestURLCurrent = `${requestURL}&per_page=${this.postsPerPage}&exclude=${this.excludedPostId}&page=${this.currentPage}`;
                axios
                    .get(requestURLCurrent)
                    .then(response => {
                        this.posts   = response.data;
                        if (this.currentPage * this.postsPerPage >= response.headers['x-wp-total']) {
                            this.hasMorePosts = false;
                        }
                        this.isLoading = false;
                    })
                    .catch(error => {
                        console.error(error);
                        this.hasError = true;
                        this.isLoading = false;
                    })
            },
            getFeaturedMediaSourceUrl(post) {
                if (
                       post
                    && post._embedded
                    && post._embedded['wp:featuredmedia']
                    && post._embedded['wp:featuredmedia'][0]
                    && post._embedded['wp:featuredmedia'][0].media_details
                    && post._embedded['wp:featuredmedia'][0].media_details.sizes
                ) {
                    const sizes = post._embedded['wp:featuredmedia'][0].media_details.sizes;

                    if (sizes.medium && sizes.medium.source_url) {
                        return sizes.medium.source_url;
                    } else if (sizes.full && sizes.full.source_url){
                        return sizes.full.source_url;
                    }
                }

                return null;
            },
            getTerm(post) {
                if (
                       post
                    && post._embedded
                    && post._embedded['wp:term']
                    && post._embedded['wp:term'][0]
                    && post._embedded['wp:term'][0][0]
                    && post._embedded['wp:term'][0][0].name
                ) {
                    return post._embedded['wp:term'][0][0].name;
                } else {
                    return null;
                }
            },
            getAuthor(post) {
                if (
                       post
                    && post._embedded
                    && post._embedded.author
                    && post._embedded.author[0]
                ) {
                    return post._embedded.author[0];
                } else {
                    return null;
                }
            }
        },
        mounted() {
            this.getPostsFromPage();
        }
    }
</script>

<style lang="scss">
    @import "../../../styles/general/variables";
    @import "../../../styles/general/mixins";
    @import "../../../styles/general/placeholders";

    .recent-posts-wrapper {
        @include container();
        @extend %generic-component;

        .recent-posts-component > h2 {
            text-transform: uppercase;
        }

        .recent-posts-list {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            list-style: none;

            @media(max-width: $screen-md-min) {
                flex-direction: column;
            }
        }
    }
</style>
