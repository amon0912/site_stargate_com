var form = document.querySelector('#form');
var msg = document.querySelector('#msg');

form.addEventListener('submit', (e) => {
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    e.preventDefault();
    xhr.onreadystatechange = () => {
        if (xhr.open == 200 && xhr.readyState == 4) {
            if (xhr.response.err) {
                msg.className = 'alert-success';
                msg.innerHTML = xhr.response;
            } else {
                msg.innerHTML = xhr.response.msg;
                msg.className = 'alert-danger';
            }
        }
        console.log(xhr);
    }


    xhr.open('POST', 'traitement/connexion_client.php', true);
    xhr.responseType = 'json';
    xhr.send(data);
});