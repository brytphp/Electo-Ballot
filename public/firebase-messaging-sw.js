importScripts(
    "https://www.gstatic.com/firebasejs/10.0.0/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/10.0.0/firebase-messaging-compat.js"
);

firebase.initializeApp({
    apiKey: "AIzaSyCskLX_xqta5QK6RjSkCHdb8eKHAE3NGrE",
    authDomain: "electo-71b04.firebaseapp.com",
    projectId: "electo-71b04",
    storageBucket: "electo-71b04.appspot.com",
    messagingSenderId: "18074688119",
    appId: "1:18074688119:web:1cf1c19061206c12f90472",
    measurementId: "G-XQLKJB25ZG"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(({
    notification
}) => {
    console.log("[firebase-messaging-sw.js] Received background message ");
    // Customize notification here
    const notificationTitle = notification.title;
    const notificationOptions = {
        body: notification.body,
    };

    if (notification.icon) {
        notificationOptions.icon = notification.icon;
    }

    self.registration.showNotification(notificationTitle, notificationOptions);
});





// // Give the service worker access to Firebase Messaging.
// // Note that you can only use Firebase Messaging here. Other Firebase libraries
// // are not available in the service worker.
// importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js');

// // Initialize the Firebase app in the service worker by passing in
// // your app's Firebase config object.
// // https://firebase.google.com/docs/web/setup#config-object
// firebase.initializeApp({
//     apiKey: "AIzaSyCskLX_xqta5QK6RjSkCHdb8eKHAE3NGrE",
//     authDomain: "electo-71b04.firebaseapp.com",
//     projectId: "electo-71b04",
//     storageBucket: "electo-71b04.appspot.com",
//     messagingSenderId: "18074688119",
//     appId: "1:18074688119:web:1cf1c19061206c12f90472",
//     measurementId: "G-XQLKJB25ZG"
// });

// // Retrieve an instance of Firebase Messaging so that it can handle background
// // messages.
// const messaging = firebase.messaging();


// messaging.setBackgroundMessageHandler(function ({
//     data: {
//         title,
//         body,
//         icon
//     }
// }) {

//     alert(1);
//     return self.registration.showNotification(title, {
//         body,
//         icon
//     });
// });

// messaging.onBackgroundMessage((payload) => {

//     alert(2)
//     console.log(
//         '[firebase-messaging-sw.js] Received background message ',
//         payload
//     );
//     // Customize notification here
//     const notificationTitle = payload.notification.title;
//     const notificationOptions = {
//         body: payload.notification.body,
//         // icon: '/theme/images/logo-light.svg',
//         icon: '',
//     };

//     self.registration.showNotification(notificationTitle, notificationOptions);
// });




// importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

// firebase.initializeApp({
//     apiKey: "AIzaSyCskLX_xqta5QK6RjSkCHdb8eKHAE3NGrE",
//     authDomain: "electo-71b04.firebaseapp.com",
//     projectId: "electo-71b04",
//     storageBucket: "electo-71b04.appspot.com",
//     messagingSenderId: "18074688119",
//     appId: "1:18074688119:web:1cf1c19061206c12f90472",
//     measurementId: "G-XQLKJB25ZG"
// });

// const messaging = firebase.messaging();
// messaging.setBackgroundMessageHandler(function ({
//     data: {
//         title,
//         body,
//         icon
//     }
// }) {
//     return self.registration.showNotification(title, {
//         body,
//         icon
//     });
// });
