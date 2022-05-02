document.getElementById("score").innerHTML = "Score " + String(localStorage.getItem("mostRecentScore") + "/" + String(localStorage.getItem("que")));
function clear(){
    localStorage.clear();
}

let t = Array.from(document.getElementsByClassName("in"));

for(let i = 0; i<7; i++){
    console.log(t[i]);
    t[i].style.visibility="hidden";
}

let username = document.getElementById("username").value;
let topic=localStorage.getItem("topic")
let diff = localStorage.getItem("diff");
let question = localStorage.getItem("que");
var date = new Date();
today=date.getDate()+"-"+String(parseInt(date.getMonth()+1))+'-'+date.getFullYear();
var time = date.getHours() + ":" + String(parseInt(date.getMinutes())+1);
let score =  parseInt(localStorage.getItem("mostRecentScore"));
var perc = String(((parseInt(score)/parseInt(question))*100).toPrecision(3));

console.log(username,topic,diff,question,today,time,score,perc);

document.getElementById("question").value = question;
document.getElementById("Score").value = score;
document.getElementById("time").value = time;
document.getElementById("percentage").value = perc;
document.getElementById("topic").value = topic;
document.getElementById("date").value = today;
document.getElementById("diff").value = diff;

// function savetheRecord(){
    
//     var httpr = new XMLHttpRequest();
//     var str = "userdetails.php?"+"username="+username+"&question="+question+"&score="+score+"&time="+time+"&perc="+perc;
//     console.log(str);
//     httpr.open("GET",str,true);
//     // httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     // httpr.onreadystatechange=function(){
//     //     if(httpr.readyState == 4 && httpr.status == 200){
            
//     //     }
//     // }


//     httpr.send(str);
// }