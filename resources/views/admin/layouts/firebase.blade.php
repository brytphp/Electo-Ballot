<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCskLX_xqta5QK6RjSkCHdb8eKHAE3NGrE",
        authDomain: "electo-71b04.firebaseapp.com",
        projectId: "electo-71b04",
        storageBucket: "electo-71b04.appspot.com",
        messagingSenderId: "18074688119",
        appId: "1:18074688119:web:1cf1c19061206c12f90472",
        measurementId: "G-XQLKJB25ZG"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();



    messaging.onMessage(function({
        data: {
            body,
            title
        }
    }) {
        new Notification(title, {
            body
        });
    });
</script>
