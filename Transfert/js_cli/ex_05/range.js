
function range(start, end, step = 1) {
  let foo = [];

  if(step > 0) {
    for (let i = start; i <= end; i+=step) {
      foo.push(i);
    }
    return foo;
  } else {
    for (let i = end; i <= start; i-=step) {
      foo.push(i);
    }
    return foo.reverse();
  }
}

console.log(range(1, 10,2));
console.log(range(19, 22));
console.log(range(5, 2, -1));
