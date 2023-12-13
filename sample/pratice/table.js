window.onload = function() {
    var canvas = document.getElementById("chartcanvas");
    var context = canvas.getContext("2d");
    var sw = canvas.width;
    var sh = canvas.height;
    var PADDING=100;

    var data = [30.3, 24.6, 19.3, 16.3, 2.3, 7.2];

    var color = ["#7cfc00","0000ff","ff1493","66CDAA","ff00ff", "#FFD700"];

    var center_X=sw/2;
    var center_Y=sh/2;

    var radius = Math.min(sw-(PADDING*2), sh-(PADDING*2))/2;

    var angle = 0;
    var total = 0;
    for(var i in data) { total += data[i]; }

    for(var i = 0; i<data.length; i++) {
        context.fillStyle = colors[i];
        context.beginPath();
        context.moveTo(center_X, center_Y);
        context.arc(center_X, center_Y, radius, angle, angle +(Math.PI*2*(data[i]/total)));
        context.lineTo(center_X,center_Y);
        context.fill();
        angle += Math.PI*2*(data[i]/total);
        
    }
}

