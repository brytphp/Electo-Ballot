<template>
    <div>
        <!-- <a href="javascript:void(0)" id="v-step-0" class="btn btn-danger btn-xl"> Heloo world</a>

        <div id="v-step-0">A DOM element on your page. The first step will pop on this element because its ID is 'v-step-0'.
        </div>
        <div class="v-step-1">A DOM element on your page. The second step will pop on this element because its ID is
            'v-step-1'.</div>
        <div data-v-step="2">A DOM element on your page. The third and final step will pop on this element because its ID is
            'v-step-2'.</div>

        <v-tour name="myTour" :steps="steps"></v-tour> -->
    </div>
</template>



<script>

// Import the functions you need from the SDKs you need
import {
    initializeApp
} from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";






export default {
    name: 'my-tour',
    data() {
        return {
            steps: [
                {
                    target: '#v-step-0',  // We're using document.querySelector() under the hood
                    header: {
                        title: 'Get Started',
                    },
                    content: `Discover <strong>Vue Tour</strong>!`
                },
                {
                    target: '#faq',
                    content: 'An awesome plugin made with Vue.js!'
                },
                {
                    target: '[data-v-step="2"]',
                    content: 'Try it, you\'ll love it!<br>You can put HTML in the steps and completely customize the DOM to suit your needs.',
                    params: {
                        placement: 'top' // Any valid Popper.js placement. See https://popper.js.org/popper-documentation.html#Popper.placements
                    }
                }
            ]
        }
    },
    mounted: function () {
        // this.$tours['myTour'].start()
    },
    created() {

        const firebaseConfig = {
            apiKey: "AIzaSyCskLX_xqta5QK6RjSkCHdb8eKHAE3NGrE",
            authDomain: "electo-71b04.firebaseapp.com",
            projectId: "electo-71b04",
            storageBucket: "electo-71b04.appspot.com",
            messagingSenderId: "18074688119",
            appId: "1:18074688119:web:1cf1c19061206c12f90472",
            measurementId: "G-XQLKJB25ZG"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);


        // Get registration token. Initially this makes a network call, once retrieved
        // subsequent calls to getToken will return from cache.
        const messaging = getMessaging(app);

        onMessage(messaging, (payload) => {
            alert(payload)
            console.log('Message received. ', payload);
            // ...
        });


        getToken(messaging, { vapidKey: 'BJx1cfbFRB5CV_o3Y9ZKj4fQoTZVILeBJztk49o6rFs-zYdtAmbSQojbssaKQEIkH3LWayicRvTj_LisiqQlo0I' }).then((currentToken) => {
            if (currentToken) {

                console.log(currentToken)

                axios.patch('/fcm-token', {
                    token: currentToken
                })
                    .then(response => {
                    })
                    .catch(error => {
                    });
            } else {

            }
        }).catch((err) => {
        });




        Notification.requestPermission().then((permission) => {
            if (permission === "granted") {
                console.log("Notification permission granted.");
            }
        });
        this.subscribe();
    },
    methods: {
        subscribe() {

        },
    },
};

</script>
