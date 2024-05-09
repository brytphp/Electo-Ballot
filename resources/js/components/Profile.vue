<template>
    <div>
        <div class="app-header text-center">
            <template v-if="isLoading">
                Loading...
            </template>

            <template v-else>
                <span v-if="showAllPages">
                    {{ pageCount }} page(s)
                </span>

                <span v-else>
                    <button type="button" :disabled="page <= 1" @click="page--">BACK</button>

                    {{ page }} / {{ pageCount }}

                    <button type="button" :disabled="page >= pageCount" @click="page++">NEXT</button>
                </span>

                <label class="right text-white">
                    <a :href="source" class="text-white" target="_blank">Open</a>
                </label>
            </template>
        </div>

        <div class="app-content">
            <vue-pdf-embed ref="pdfRef" :source="source" :page="page" @rendered="handleDocumentRender" />
        </div>

        <div class="app-header text-center">
            <template v-if="isLoading">
                Loading...
            </template>

            <template v-else>
                <span v-if="showAllPages">
                    {{ pageCount }} page(s)
                </span>

                <span v-else>
                    <button type="button" :disabled="page <= 1" @click="page--">BACK</button>

                    {{ page }} / {{ pageCount }}

                    <button type="button" :disabled="page >= pageCount" @click="page++">NEXT</button>
                </span>

                <label class="right text-white">
                    <a :href="source" class="text-white" target="_blank">Open</a>
                </label>
            </template>
        </div>

    </div>

</template>
<script>
import VuePdfEmbed from 'vue-pdf-embed/dist/vue2-pdf-embed'


export default {
    props: ['goto_page'],
    components: {
        VuePdfEmbed,
    },
    data() {
        return {
            source: '/brochure.pdf',
            page: 1,
            pageCount: 1,
            showAllPages: false,
            isLoading: true,
        };
    },
    methods: {
        handleDocumentRender() {
            this.isLoading = false
            this.pageCount = this.$refs.pdfRef.pageCount
            // this.form.pdfPages = this.$refs.pdfRef.pageCount
        },
        gotoPage(page) {
            this.page = page


        }
    },

    created() {
        var _this = this;

        this.page = parseInt(this.goto_page)


        $(document).ready(function () {
            $('body').on('click', '.gotoPage', function (e) {
                _this.page = $(this).data("page")
            })
        });
    },
    watch: {
        showAllPages() {
            this.page = this.showAllPages ? null : 1
        },
    },

}

</script>





<style>
canvas {
    margin-bottom: 8px;
    box-shadow: 0 2px 8px 4px rgba(0, 0, 0, 0.1);
}

.app-header {
    padding: 16px;
    box-shadow: 0 2px 8px 4px rgba(0, 0, 0, 0.1);
    background-color: #1A233A;
    color: #ddd;
}

.app-content {
    padding: 24px 16px;
}

.right {
    float: right;
}

#comments-box {
    padding: 16px;
    height: 50vh;
    overflow-y: scroll;
    box-shadow: 0 2px 4px 0.5px rgba(0, 0, 0, 0.1);
}


.comment:hover {
    box-shadow: 0 0 2px rgba(10, 10, 10, .9);
}



.comment:hover .delete-comment {
    display: block;
}

.delete-comment {
    display: none;
}
</style>
