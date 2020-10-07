function drawTriangle(rows)
{
    try {
        if(!parseInt(rows)) throw "the var must to be an integer";
        if(rows < 2) throw "the var must to be sup to 1";
        
        for (let i = 0; i < rows; i++) {
        var output = '';
        for (let j =0; j < rows - i; j++) output += ' ';
        for (let k = 0; k <= i; k++) output += ' $';
        console.log(output);  
    } 
    } catch (err) {
        console.warn(err);
    }
}
