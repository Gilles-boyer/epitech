window.addEventListener('load', function () {
    var documentDiv = document.querySelector('footer');
    var p = documentDiv.querySelector('div');
    p.onclick = function() {  

        var name = prompt('Quel est votre nom ?');
        
        while(!name) { name = prompt('Quel est votre nom ?'); }

        var test = confirm('Etes vous sûr que '+name+' est votre nom ?');
        
        if(test){
            alert('Bonjour '+name+' !')
            documentDiv.querySelector('div').textContent = 'Bonjour '+name+' !';
        }
    }; 
});