import './bootstrap';

import EchoLibrary from "laravel-echo"

Echo.channel('ticket-check').listen('EmailPageReload', (e) => {
    //const div = document.getElementById('new-ticket');
    //div.innerHTML = e.data;
    console.log(e.data);
})
