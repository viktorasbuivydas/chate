/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost: import.meta.env.VITE_PUSHER_HOST,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    scheme: import.meta.env.VITE_PUSHER_SCHEME,
    enabledTransports: ["ws", "wss"],
});

console.log("Echo", window.Echo);
console.log(window);
// subscribe to private channel
window.Echo.private("inbox." + window.userId);
//     .listen("InboxMessageSent", (e) => {
