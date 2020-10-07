function objectsDeeplyEqual(cmp1, cmp2)
{
   if (JSON.stringify(cmp1) !== JSON.stringify(cmp2)) return false;
   return true;
}

var obj = {here: {is: "an"}, object: 2};

console.log(objectsDeeplyEqual(obj, obj));
console.log(objectsDeeplyEqual(obj, {here: 1, object: 2}));
console.log(objectsDeeplyEqual(obj, {here: {is:"an"}, object: 2}));