// JavaScript Document
function reportPrint(strid)
{
var prtContent = document.getElementById(strid);
var Winecho =
window.open('','','left=0,top=0,width=900,height=600,toolbar=0,scrollbars=1,status=0');
Winecho.document.write(prtContent.innerHTML);
Winecho.document.close();
Winecho.focus();
Winecho.echo();
Winecho.close();
prtContent.innerHTML=strOldOne;
}
