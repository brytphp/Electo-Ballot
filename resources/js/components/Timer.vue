<template>
    <div>
        <countdown :time="end_date">
            <template slot-scope="props">Time Remaining：{{ props.days }} days, {{ props.hours }} hours,
                {{ props.minutes }} minutes, {{ props.seconds }} seconds.</template>
        </countdown>


        <!-- {{ end_date }} -->
    </div>
</template>



<script>
import Vue from 'vue';
import VueCountdown from '@chenfengyuan/vue-countdown';

Vue.component(VueCountdown.name, VueCountdown);

export default {
    props: ['end_date'],
    name: 'my-tour',
    data() {
        return {

        }
    },
    mounted: function () {
        // this.$tours['myTour'].start()
    },
    created() {

    },
    methods: {
        subscribe() {

        },
    },
};

</script>
