// JavaScript Document
function dateTimeShow()
{
var today  =  new Date();
var hh     =  today.getHours();
var mm     =  today.getMinutes();
var ss     =  today.getSeconds();
mm   =   checkTimes(mm);
ss   =   checkTimes(ss);
if(hh<12)
{ var amPm = "AM"; } else { var amPm = "PM";}
//document.getElementById('datetime').innerHTML= hh + ":" +mm+":"+ss+" "+ amPm;
$('#headerdatetime').text(hh + ":" +mm+":"+ss+" "+ amPm);
  setTimeout("dateTimeShow()",500);
}

function checkTimes(i)
{
  if(i<10)
  return "0"+i;
  else
  return i;
}
dateTimeShow();