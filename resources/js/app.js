import './bootstrap';


window.Echo.channel('test')
    .listen('.xx', (e) => {
        console.log(e)
    });






