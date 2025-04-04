<script>
import { getTagsByAlbumId } from '../../../../services/assets_service.js';

export default {
    props: ['albumId'],
    data() {
        return {
            tags: []
        };
    },
    mounted() {
        this.loadTags();
    },
    methods: {
        async loadTags() {
            try {
                const response = await getTagsByAlbumId(this.albumId);
                const { album_tags, photo_tags, video_tags } = response.data;

                // Combine all tags, remove duplicates, and flatten
                const allTags = [...album_tags, ...photo_tags, ...video_tags];
                this.tags = [...new Set(allTags)];
            } catch (error) {
                console.error('Error fetching tags:', error);
            }
        },
        goToTag(tag) {
            this.$router.push({ path: '/events-tags', query: { searchTag: tag } });
        }
    }
};
</script>

<template>
    <aside class="single_sidebar_widget tag_cloud_widget">
        <h4 class="widget_title">Tag Clouds</h4>
        <ul class="list">
            <li v-for="(tag, index) in tags" :key="index">
                <a href="javascript:void(0)" @click="goToTag(tag)">
                    {{ tag }}
                </a>
            </li>
        </ul>
    </aside>
</template>


