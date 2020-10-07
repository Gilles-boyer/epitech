function fizzBuzz() {
    let count = 20;
    var g = ""

    for(var i = 1 ; i <= count ; i++) {
        let t = i/3
        let f = i/5
        
        if(Number.isInteger(t) && Number.isInteger(f)) {
            g += "FizzBuzz, "
        } else if (Number.isInteger(t)) {
            g += "Fizz, "
        } else if (Number.isInteger(f)) {
            g += "Buzz, "
        } else {
            g += i.toString()+", "
        }
    }
    console.log(g)
}
fizzBuzz()