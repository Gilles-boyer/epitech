window.addEventListener('load', function () {
    var documentDiv = document.querySelector('footer');
    var val = "";
    document.onkeypress = function () { 
        var x = event.charCode || event.keyCode; 
        var y = String.fromCharCode(x);
        val += y;
        var lastC =val.substr(-42); 
        documentDiv.querySelector('div').innerHTML = lastC;
    };
}); 
