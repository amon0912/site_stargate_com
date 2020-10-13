var form = document.querySelector('#form');
var msg = document.querySelector('#msg');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            if (xhr.response.err) {
                msg.className = 'alert-success text-center rounded';
                msg.innerHTML = xhr.response.msg;

                setTimeout(()=>{
                    window.location.href = '?=home';
                },3000);
            } else {
                msg.innerHTML = xhr.response.msg;
                msg.className = 'alert-danger text-center rounded';
            }
        }
        console.log(xhr.response);
    }


    xhr.open('POST', 'traitement/inscription_client.php', true);
    xhr.responseType = 'json';
    xhr.send(data);
});