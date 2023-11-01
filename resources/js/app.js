import './bootstrap';


import Clipboard from "@ryangjchandler/alpine-clipboard"

import Tagify from '@yaireo/tagify'
Alpine.plugin(Clipboard)

window.Tagify = Tagify;



// window.io = io;
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'socket.io',
//     host: "http://172.30.202.124/",

// });
// window.Echo.connector.socket.on("connect", function() {
//     console.debug("Connected");
// });
// window.Echo.connector.socket.on("disconnect", function() {
//     console.debug("disconnected");
// });
// window.Echo.connector.socket.on("error", function() {
// console.debug("error");
// });


