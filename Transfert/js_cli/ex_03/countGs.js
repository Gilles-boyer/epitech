function countGs(str = null) {

    try {
        if(typeof str != "string") throw "please write a string"
        if(str == null) throw "string is null"
        
        var count=0,len=str.length;

        for(var i=0;i<len;i++) {
            if(/[A-Z]/.test(str.charAt(i))) count++;
        }

        return count;   
        
    } catch (error) {
        return error;
    }
  }


console.log(countGs('AbC'));