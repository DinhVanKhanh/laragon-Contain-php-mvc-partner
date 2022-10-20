
function swImg(iName,str)
	{ document.images[iName].src = str; }

data = new Array("");
prImg= new Array();
for (i=0; i<data.length; i++)
{
	prImg[i] = new Image();
	prImg[i].src = data[i];
}

var url;

function OpenWinYoko(url){
	var win1 = window.open(url,'imgwin_y','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=650,height=500');
}

function OpenWinTate(url){
	var win1 = window.open(url,'imgwin_t','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=500,height=650');
}

function OpenWinTateBig(url){
	var win1 = window.open(url,'imgwin_t','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=600,height=750');
}

function OpenWinBig(url){
	var win1 = window.open(url,'imgwin_b','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=800,height=650');
}

function OpenWinMin(url){
	var win1 = window.open(url,'imgwin_m','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=500,height=400');
}

function HowToWM(){
	var win1 = window.open('/listing/movie/howtowm.html','howtowm','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=500,height=320');
}

function OpenWinDplt(){
	var win1 = window.open('/listing/dplt/','dplt','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=730,height=750');
}

function OpenWinW600(url,target){
	var win1 = window.open(url,target,'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=600,height=800');
}

function ClearEx(obj){
	if(obj.value == obj.defaultValue){
		obj.value = "";
		obj.style.color = "#000000";
	}
}

function ShowEx(obj){
	if(obj.value == ""){
		obj.value = obj.defaultValue;
		obj.style.color = "#B0B0B0";
	}
}

