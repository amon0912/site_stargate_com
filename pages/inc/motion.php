<style>
    .bar {
        /* background: red; */
        width: 100%;
        height: 5px;
    }

    .effet {
        color: blue;
        background-color: blue;
        height: 5px;
        width: 0%;
    }
</style>


<div class="bar">
    <div class="effet"></div>
</div>
<script>
    var effet = document.querySelector('.effet');
    //effet.style.width = "100%";
    var i = 0;
    var e = window.setInterval(() => {
        i = i + 1;
        if (i <= 100) {
            effet.style.width = i + "%";
            
        } else {
            i = 0;
        }
        // console.log(i);
    }, 100);
    // setTimeout(() => {
    //     clearInterval(e);
    // }, 6000)
</script>