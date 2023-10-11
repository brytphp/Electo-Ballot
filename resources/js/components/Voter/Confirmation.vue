<template>
    <div class="row">
        <div class="col-md-12">
            <div class="vld-parent" ref="ballot">
                <loading :active.sync="isLoading" :can-cancel="false" :opacity="0.2" :height="50" :width="50"
                    :is-full-page="fullPage" loader="dots"></loading>

                <div class="card">
                    <div class="card-body">
                        <a :href="previous" class="btn btn-dark float-left waves-effect waves-light">Back</a>

                        <button class="btn btn-success float-right waves-effect waves-light" @click="confirmVote">Cast
                            Vote</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    Form
} from "vform";

import Loading from 'vue-loading-overlay';
// Import stylesheet

export default {
    components: {
        Loading,
    },
    props: ['previous'],
    data() {
        return {
            isLoading: false,
            fullPage: true,
            form: new Form({
                candidates: [],
            }),
        };
    },

    methods: {
        confirmVote() {


            this.$modal.show('dialog', {
                title: '<span style="text-align:center"><i class="bx bx-info-circle bx-tada mr-2"></i>Final Step! <br></span>This can not be reversed. Are you sure about this? </span>',
                buttons: [
                    {
                        title: '<div class="dialog-popup text-danger">No</div>',
                        handler: () => {
                            this.$modal.hide('dialog')
                        }
                    },
                    {
                        title: '<div class="dialog-popup text-success" >Yes</div>',
                        handler: () => {
                            this.$modal.hide('dialog')
                            this.isLoading = true
                            this.form.post(this.route("api.ballot.paper.vote", {})).then(({
                                data
                            }) => {
                                window.location.href = this.route('voter.ballot.success');
                                return false;
                            })
                                .catch(error => {

                                });
                        }
                    },

                ]
            })
        },
    },
    created() {

    }
};

</script>



<style>
.countdown {
    display: flex;
}

.block {
    display: flex;
    flex-direction: column;
    margin: 20px;
}

.text {
    color: #1abc9c;
    font-size: 25px;
    font-family: 'Roboto Condensed', serif;
    font-weight: 40;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
}

.digit {
    color: #ecf0f1;
    font-size: 130px;
    font-weight: 100;
    font-family: 'Roboto', serif;
    margin: 10px;
    text-align: center;
}
</style>
