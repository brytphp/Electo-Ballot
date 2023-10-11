<template>
    <div></div>
</template>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    export default {
        props:['electo_channel'],
        created() {
            this.subscribe();
        },
        methods: {
            subscribe() {
                Pusher.logToConsole = false;

                let pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
                    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
                    // forceTLS: true
                });

                pusher.subscribe("import-channel");
                pusher.bind(
                    "import-event",
                    (data) => {
                        Notification.requestPermission((permission) => {
                            let notification = new Notification("Users import", {
                                body: "Import complete",
                                // icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                            });
                        });

                        this.toast.success('Import completed')

                    },
                ); // <=== pass this as context

                pusher.subscribe(this.electo_channel + "-channel");
                pusher.bind(
                    this.electo_channel + "-event",
                    (data) => {
                        this.$parent.$refs.election_live_chart.verified = data.message.verified;
                        this.$parent.$refs.election_live_chart.voted = data.message.voted;
                    },
                );

                pusher.subscribe(this.electo_channel + "-chart-channel");
                pusher.bind(
                    this.electo_channel + "-chart-event",
                    (data) => {
                        this.$parent.$refs.election_live_chart.chartOptions.series = data.message.series;
                        this.$parent.$refs.election_live_chart.chartOptions.drilldown = data.message.drilldown;
                    },
                );



            },
        },
    };

</script>
