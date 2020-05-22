if ( window.addEventListener ) {
    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65,13";
    window.addEventListener("keydown", function(e){
        kkeys.push( e.keyCode );
        if ( kkeys.toString().indexOf( konami ) >= 0 ) {
            alert('bravo, vous avez fait le konamie code, prepare vous à une surprise');
            window.location = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
        }
    }, true);
}