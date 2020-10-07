window.addEventListener('load', function () {
    var documentDiv = document.querySelector('footer');
    var p = documentDiv.querySelector('div');
    var click = 0;
    p.onclick = function() {  
        click ++; documentDiv.querySelector('div').textContent = click; 
    };     
});


