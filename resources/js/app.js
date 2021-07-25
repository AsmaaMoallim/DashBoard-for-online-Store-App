require('./bootstrap');

function displayImage(e) {
    var elem = document.getElementsByClassName('img');
    e = e || window.event;
    var t = e.target;
    var imgArray = $('[id^=img]').map(function (i) {
        //return this.name;
        // alert(this.name)
        if (t.name == this.name) {
            window.location.href = t.src;
        }
        return this.value; // for real values of input
    }).get();
}
