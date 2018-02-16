function CalcTimePercent(i, lastpayment, nextpayment, t, p) {

	var time    = nextpayment - t;
    var hour    = parseInt(time / 3600);
    if ( hour < 1 ) hour = 0;
    time = parseInt(time - hour * 3600);
    if ( hour < 10 ) hour = '0'+hour;
 
    var minutes = parseInt(time / 60);
    if ( minutes < 1 ) minutes = 0;
    time = parseInt(time - minutes * 60);
    if ( minutes < 10 ) minutes = '0'+minutes;
    var seconds = time;
    if ( seconds < 10 ) seconds = '0'+seconds;
 
	timer = hour+':'+minutes+':'+seconds;
	document.getElementById('deptimer'+i).innerHTML = timer;

	if(timer == "00:00:00") {
		top.location.href='deposits/';
	}

	t = t + 1;
	setTimeout("CalcTimePercent("+i+", "+lastpayment+", "+nextpayment+", "+t+", "+p+")",1000);
}