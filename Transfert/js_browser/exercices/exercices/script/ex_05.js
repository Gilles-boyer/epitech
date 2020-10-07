function changeBack(id){
    check = document.body.style.background = id;
}
window.addEventListener('load', function () {
    var documentButton= document.querySelector('footer');
    var p = documentButton.querySelector('button');
    var size = 1;
    p.onclick = function() { //+
        size +=0.1;
        document.querySelector('body').style.fontSize = size+"em";
    }

    var m = p.nextElementSibling;
    m.onclick = function() { //-
        size -=0.1;
        document.querySelector('body').style.fontSize = size+"em";
    }

    //change bg
    var select = document.querySelector('select');  
    var choice = select.selectedIndex;
    var id = select.options[choice].value;
    select.onchange =  changeBack(id)
    select.onchange =  function () { location.reload() };

})