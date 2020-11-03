
var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var time="<h1 id='currentTime'>"+nhour+":"+nmin+":"+nsec+ap+"</h1>";
var date="<h4 id='currentDate'>"+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+"</h4>";
document.getElementById('time').innerHTML=time;
document.getElementById('date').innerHTML=date;

}

GetClock();
setInterval(GetClock,1000);