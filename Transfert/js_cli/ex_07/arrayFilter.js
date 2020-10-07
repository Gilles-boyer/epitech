function arrayFilter(array, test = null)  {
    let tab =[];
    if(test != null) { 
        array.forEach(element => {
        if( test(element) ) { tab.push(element) }
        });
    } else {
        array.forEach(element => {
            tab.push(element)
        });
   }
    return tab;
}

var toFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9];
var passed = arrayFilter(toFilter, function (value) {return value % 3 === 0;});
console.log(passed);
