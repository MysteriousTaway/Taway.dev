const Text = [];
Text.push("T","a","w","a","y",".","d","e","v");
document.getElementById("webName").innerText = "";
var current = "";
var i = 0;
(function(){
    current += Text[i];
    if(i < Text.length-1) {
        document.getElementById("webName").innerText = current + "_";
    } else {
        document.getElementById("webName").innerText = current;
    }
    i++;
    if(i !== Text.length){
        setTimeout(arguments.callee, Math.random() * (400 - 150) + 150);
    }
})();