class User 
{
    constructor(name = 'bernard', age = 42) {
        if (age <= 0) { return console.log("there are a problem with age") }
        if (name == '') { return console.log("there are a problem with name") }

        this.name = name;
        this.age = age;
    }

    printMe() {
        return  console.log(`Hello, my name is ${this.name} and I am ${this.age}  years old. `);
    }
}

let gil = new User('Albert', 99 );
gil.printMe();

