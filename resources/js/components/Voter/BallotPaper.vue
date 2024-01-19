<template>
    <div class="container-fluid">
        <div class="vld-parent" ref="ballot">
            <loading :active.sync="isLoading" :can-cancel="false" :opacity="0.2" :height="50" :width="50"
                :is-full-page="fullPage" loader="dots"></loading>

            <!-- start page title -->
            <div class="row" v-if="isLoading == false">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">{{ ballot.data.position.position }}</h4>

                        <div class="page-title-right">
                            <h4 class="mb-0 font-size-18">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Selected :
                                            {{ this.form.candidates.length }}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: void(0);">{{
                                        this.ballot.data.position.chances }}</a></li>
                                </ol>
                            </h4>
                        </div>
                    </div>
                    <!-- <marquee behavior="" direction="">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    </marquee> -->
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center" v-if="isLoading == false">
                <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4" v-for="(candidate, index) in ballot.data.candidates"
                    :key="index">
                    <div class="card text-center team-box rounded h100" @click="toggleCandidate(candidate.id, index + 1)">

                        <div class="card-body ballot" :class="form.candidates.includes(candidate.id) ? 'voted' : ''">
                            <div class="cardheader rounded  border-bottom bg-faded text-dark">
                                <strong> No. {{ index + 1 }}</strong>
                            </div>

                            <div>
                                <img :src="candidate.avatar" alt="" class="rounded img-fluid">
                            </div>
                            <div class="mt-2" style="height:50px;">
                                <h6>{{ candidate.first_name }} {{ candidate.other_names }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- voted -->
            </div>

            <div class="card">
                <div class="card-body">
                    <div v-if="this.ballot.data.position.unopposed == 1">
                        <a :href="route('voter.ballot.paper', {
                            position: ballot.back
                        })" v-if="route().params.position != ballot.data.first.pid"
                            class="btn btn-dark  waves-effect waves-light mr-2">
                            BACK
                        </a>

                        <a :href="route('voter.ballot.skip', {
                            position: route().params.position,
                            next: ballot.next
                        })" class="btn btn-danger  waves-effect waves-light">
                            {{ this.ballot.data.position.skip }}
                        </a>

                        <button @click="save" class="btn btn-success float-right waves-effect waves-light"> {{
                            this.ballot.data.position.next }}</button>
                    </div>
                    <div v-else>

                        <a :href="route('voter.ballot.paper', {
                            position: ballot.back
                        })" v-if="route().params.position != ballot.data.first.pid"
                            class="btn btn-dark  waves-effect waves-light mr-2">
                            BACK
                        </a>

                        <!-- <a v-if="ballot.data.position.can_skip == 1" :href="route('voter.ballot.skip', {
                            position: route().params.position,
                            next: ballot.next
                        })" class="btn btn-danger  waves-effect waves-light">
                            {{ this.ballot.data.position.skip }}
                        </a> -->

                        <button @click="save" class="btn btn-success float-right waves-effect waves-light"
                            v-if="form.candidates.length > 0">
                            NEXT
                            <!-- {{ this.ballot.data.position.next }} -->
                        </button>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</template>

<script>
import {
    Form
} from "vform";

// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet

export default {
    components: {
        Loading,
    },
    mounted() {

    },
    data() {
        return {
            ballot: [],
            form: new Form({
                candidates: [],
            }),
            isLoading: true,
            fullPage: true
        };
    },

    methods: {

        toggleCandidate(candidate, index) {
            this.form.candidates.includes(candidate) ? this.form.candidates.splice(this.form.candidates.indexOf(
                candidate), 1) : this.form.candidates.push(candidate)

            if (this.form.candidates.length > this.ballot.data.position.chances) {
                this.form.candidates.splice(this.form.candidates.indexOf(
                    candidate), 1)

                var msg = this.ballot.data.position.chances > 1 ? ' candidates' : ' candidate';
                this.toast.warning('You can only elect ' + this.ballot.data.position.chances + msg)
                return false;
            }
        },

        save() {
            this.isLoading = true

            this.form.post(this.route("api.ballot.data.save.preference", {
                position: this.route().params.position
            })).then(({
                data
            }) => {

                window.location.href = this.route('voter.ballot.paper', {
                    position: this.ballot.next
                });
                // return false;
            })
                .catch(error => {

                });
        },

        getCandidates() {

            axios.get(this.route("api.ballot.data.get.preference", {
                position: this.route().params.position
            }))
                .then(response => {
                    this.form.candidates = response.data;
                })
                .catch(error => {

                });

            axios.get(this.route("api.ballot.data.options", {
                position: this.route().params.position
            }))
                .then(response => {
                    this.ballot = response.data;
                    this.isLoading = false

                    if (response.data.data.position.unopposed == 1) {
                        this.form.candidates = []
                        this.form.candidates.push(response.data.data.candidates[0].id)
                    }
                })
                .catch(error => {

                });
        },
    },
    async created() {
        this.getCandidates()
    }
};

</script>
