<template>
    <div>

        <div class="card-footer bg-transparent border-top">
            <div class="contact-links d-flex font-size-20">
                <div class="flex-fill">
                    <button type="button" class="btn btn-outline-dark  waves-effect waves-light " data-toggle="modal"
                        data-backdrop="static" :disabled="form.busy" data-target="#myModal">Update My
                        Details</button>

                    <button @click="confirmDetails()" type="button" :disabled="form.busy"
                        class="btn float-left btn-outline-success waves-effect waves-light float-right">
                        This Looks Good
                    </button>

                </div>

            </div>
        </div>






        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Member Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="outer-repeater" @submit.prevent="confirmUpdate" @keydown="form.onKeydown($event)">
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item="" class="outer">

                                    <div class="text-center">
                                        <h3 class="text-danger">Member ID : {{ form.voter_id }}</h3>
                                    </div>

                                    <hr>
                                    <!--
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input v-model="form.first_name"
                                                    :class="{ 'is-invalid': form.errors.has('first_name') }"
                                                    id="first_name" type="text" min="0" class="form-control"
                                                    placeholder="">
                                                <has-error :form="form" field="first_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="other_names">Other Names</label>
                                                <input v-model="form.other_names"
                                                    :class="{ 'is-invalid': form.errors.has('other_names') }"
                                                    id="other_names" type="text" min="0" class="form-control"
                                                    placeholder="">
                                                <has-error :form="form" field="other_names"></has-error>
                                            </div>
                                        </div>

                                    </div> -->

                                    <div class="alert alert-info" role="alert">
                                        <b>Please note that update will also affect your ICAG member’s portal</b>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Active Email</label>
                                                <input v-model="form.email"
                                                    :class="{ 'is-invalid': form.errors.has('email') }" id="email"
                                                    type="email" class="form-control" placeholder="">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="country_code">Country</label>
                                                <select v-model="form.country_code"
                                                    :class="{ 'is-invalid': form.errors.has('country_code') }"
                                                    id="country_code" class="form-control">
                                                    <option v-for="(country, prefix) in countries" :value="prefix">{{
                                                        country }}</option>
                                                </select>
                                                <has-error :form="form" field="country_code"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Active Phone Number</label>
                                                <input v-model="form.phone"
                                                    :class="{ 'is-invalid': form.errors.has('phone') }" id="phone"
                                                    maxlength="20" type="phone" class="form-control"
                                                    placeholder="eg. 0241234567">
                                                <has-error :form="form" field="phone"></has-error>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="col-md-12">
                                            <div class="alert alert-info" role="alert">
                                                <b>For Administrative Purposes Only </b>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="admission_year">Year of Admission</label>
                                                <datetime v-model="form.admission_year" placeholder="Date of birth"
                                                    type="date" auto format="yyyy-MM" class="theme-orange"
                                                    input-class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('admission_year') }">
                                                </datetime>

                                                <input type="hidden" class="form-control" placeholder=""
                                                    v-model="form.admission_year"
                                                    :class="{ 'is-invalid': form.errors.has('admission_year') }"
                                                    id="admission_year">
                                                <has-error :form="form" field="admission_year"></has-error>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date_of_birth">Date of Birth</label>
                                                <datetime v-model="form.date_of_birth" placeholder="Date of birth"
                                                    type="date" auto class="theme-orange" input-class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('date_of_birth') }">
                                                </datetime>

                                                <input type="hidden" class="form-control" placeholder=""
                                                    v-model="form.date_of_birth"
                                                    :class="{ 'is-invalid': form.errors.has('date_of_birth') }"
                                                    id="date_of_birth">
                                                <has-error :form="form" field="date_of_birth"></has-error>

                                            </div>
                                        </div>


                                    </div>


                                    <hr>
                                    <div>
                                        <div class="row">
                                            <div class="col">
                                                <Button :form="form"
                                                    class="btn btn-outline-dark waves-effect float-right waves-light">Update</Button>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</template>

<script>
import {
    Form
} from "vform";

export default {
    props: ['data'],
    data() {
        return {
            countries: [],
            form: new Form({
                voter_id: '',
                first_name: '',
                other_names: '',
                email: '',
                phone: '',
                country_code: '',
                date_of_birth: '',
                admission_year: '',
            }),
        };
    },

    methods: {
        confirmUpdate() {
            $('#myModal').modal('hide');
            $('.modal-backdrop').hide();
            this.$modal.show('dialog', {
                title: '<span class="dialog-popup" >Are you sure about this?</span>',
                buttons: [{
                    title: 'No',
                    handler: () => {
                        this.$modal.hide('dialog')
                    }
                },
                {
                    title: 'Yes',
                    handler: () => {
                        this.$modal.hide('dialog')
                        this.form.patch(this.route("api.exhibition.update.register", this.data.id))
                            .then(
                                ({
                                    data
                                }) => {
                                    this.toast.success('Successfully updated')
                                    setTimeout(() => {
                                        location.reload()
                                    }, "2000");
                                })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    $('#myModal').modal('show');
                                }
                            });
                    }
                }


                ]
            })
        },
        confirmDetails() {

            this.$modal.show('dialog', {
                title: '<span class="dialog-popup" >Are you sure about this?</span>',
                buttons: [{
                    title: 'No',
                    handler: () => {
                        this.$modal.hide('dialog')
                    }
                },
                {
                    title: 'Yes',
                    handler: () => {
                        this.$modal.hide('dialog')
                        this.form.post(this.route("api.exhibition.confirmed", this.data.id))
                            .then(
                                ({
                                    data
                                }) => {
                                    this.toast.success('Verification successful')
                                    setTimeout(() => {
                                        window.location.replace(this.route('index'));
                                    }, "2000");


                                })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    $('#myModal').modal('show');
                                }
                            });
                    }
                }


                ]
            })
        },
        mapData() {
            this.countries = window.config.countries

            this.form.voter_id = this.data.voter_id
            this.form.first_name = this.data.first_name
            this.form.other_names = this.data.other_names
            this.form.email = this.data.email
            this.form.phone = this.data.phone
            this.form.country_code = this.data.country_code
            this.form.date_of_birth = this.data.date_of_birth == null ? null : this.data.date_of_birth
            this.form.admission_year = this.data.admission_year == null ? null : this.data.admission_year
        },
    },
    created() {
        this.mapData()
    },

};

</script>
