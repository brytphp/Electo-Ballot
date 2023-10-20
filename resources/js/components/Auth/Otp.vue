<template>
    <div ref="formContainer" class="vld-parent">
        <form class="outer-repeater" @submit.prevent="save" @keydown="form.onKeydown($event)">
            <div class="form-group textcenter" style="">
                <div style="display: flex; flex-direction: row;" class="pr-5">
                    <v-otp-input ref="otpInput" input-classes="otp-input form-control" separator="-" :num-inputs="4"
                        :should-auto-focus="true" :is-input-num="true" @on-change="handleOnChange"
                        @on-complete="handleOnComplete" />
                    <!-- <button @click="handleClearInput()" class="btn btn-round btn-icon btn-dark"><i class="mdi mdi-refresh mr-1"></i></button> -->
                </div>
                <div class="ml-2 text-center pr-5">
                    <has-error :form="form" field="verification_code"></has-error>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
import {
    Form
} from "vform";

import Loading from 'vue-loading-overlay';


export default {

    components: {
        Loading,
    },
    data() {
        return {
            form: new Form({
                verification_code: '',
            }),
        };
    },

    methods: {
        handleOnComplete(value) {
            this.form.verification_code = value


            let loader = this.$loading.show({
                container: this.$refs.formContainer,
            });


            this.form.post(this.route("api.auth.verify-otp", {})).then(({
                data
            }) => {
                window.location.href = this.route('voter.ballot.paper', data);
                return false;
            })
                .catch(error => {
                    this.$refs.otpInput.clearInput();
                    loader.hide()
                });

        },
        handleOnChange(value) {
            // this.isLoading = true
            // console.log('OTP changed: ', value);
        },
        handleClearInput() {
            this.$refs.otpInput.clearInput();
        },
    },
};
</script>

<style>
.otp-input {
    width: 40px;
    height: 40px;
    padding: 5px;
    margin: 0 10px;
    font-size: 20px;
    border-radius: 4px;
    border: 1px solid #343A3F;
    text-align: center;
    /* &.error {
        border: 1px solid red !important;
      } */
}

.otp-input::-webkit-inner-spin-button,
.otp-input::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
