require('./bootstrap');


window.Echo.channel('chat').listen('.message', function (e) {

    if (e.advertiser_id) {
        $('#showMessageLeft').append(`
        <div>
        <strong>${e.first_name}</strong>
        <p>${e.messeges}</p>
    </div>`)
    }else if(e.advertiser_id){
        $('#showMessageRight').append(`
        <div>
        <strong>${e.first_name}</strong>
        <p>${e.messeges}</p>
    </div>`)
    }
  ;
});
