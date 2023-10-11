<template>
    <div class="text-center">
        <label for="verification_code">Verification Code</label>
        <div style="display: flex; flex-direction: row;">
            <v-otp-input ref="otpInput" input-classes="otp-input form-control" separator="" :num-inputs="5" :should-auto-focus="true"
                :is-input-num="false" @on-change="handleOnChange" @on-complete="handleOnComplete" />
            <!-- <button @click="handleClearInput()">Clear Input</button> -->
        </div>
    </div>

</template>


<script>
    export default {
        name: 'App',

        methods: {
            handleOnComplete(value) {
                console.log('OTP completed: ', value);
            },
            handleOnChange(value) {
                console.log('OTP changed: ', value);
            },
            handleClearInput() {
                this.$refs.otpInput.clearInput();
            },
        },
    };

</script>
