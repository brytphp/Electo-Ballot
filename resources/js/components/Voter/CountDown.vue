<template id="countdown-template">
    <div class="countdown">
        <div class="block">
            <p class="digit">{{ days | two_digits }}</p>
            <p class="text">Days</p>
        </div>
        <div class="block">
            <p class="digit">{{ hours | two_digits }}</p>
            <p class="text">Hours</p>
        </div>
        <div class="block">
            <p class="digit">{{ minutes | two_digits }}</p>
            <p class="text">Minutes</p>
        </div>
        <div class="block">
            <p class="digit">{{ seconds | two_digits }}</p>
            <p class="text">Seconds</p>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            // alert()
        }
    }

</script>
