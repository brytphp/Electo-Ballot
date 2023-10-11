<template>
    <div>

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

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input v-model="form.email"
                                                    :class="{ 'is-invalid': form.errors.has('email') }" id="email"
                                                    type="email" class="form-control" placeholder="">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input v-model="form.phone"
                                                    :class="{ 'is-invalid': form.errors.has('phone') }" id="phone"
                                                    maxlength="10" type="phone" class="form-control"
                                                    placeholder="eg. 0241234567">
                                                <has-error :form="form" field="phone"></has-error>
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
                form: new Form({
                    first_name: '',
                    other_names: '',
                    email: '',
                    phone: '',
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
                                this.form.post(this.route("voter.exhibition.update", this.data.id))
                                    .then(
                                        ({
                                            data
                                        }) => {
                                            this.toast.success('Success')

                                            location.reload()


                                        })
                                    .catch(error => {

                                        // if(errorstatus code 422)

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
                // this.form.voter_id = this.data.voter_id
                this.form.first_name = this.data.first_name
                this.form.other_names = this.data.other_names
                this.form.email = this.data.email
                this.form.phone = this.data.phone
            },
        },
        created() {
            this.mapData()
        },

    };

</script>
