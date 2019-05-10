<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Android Video Streaming</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.jwplayer.com/libraries/pE435l6f.js"></script>       
        
        <script>jwplayer.key = ""</script>
        
    </head>
 <style type="text/css">
     body { 
    padding:0;
    margin: 0;
}
.clear{
    clear: both;
}
.container{
    width: 1100px;
    margin: 0 auto;
    padding: 0;
}
#header{
    text-align: left; 
    box-shadow: 0px 3px 3px #e3e3e3;
}
#header h1{
    font:normal 35px arial;
    color: #ed4365;
    margin: 0;
    padding: 15px 0;
}
#video_preview{
    text-align: center;
}
#player, #player_wrapper{
    margin: 0 auto !important;
    margin-bottom: 20px !important;
    margin-top: 60px !important;    
}
input#stream_url{
    background: none;
    border: 2px solid #92d07f;
    outline: none;
    padding: 5px 10px;
    font: 18px arial;
    color: #666;
    width: 600px;
    text-align: center;
}
#btn_start, #btn_stop{
    padding: 8px 30px;
    color: #fff;
    border: none;
    outline: none;
    font: normal 16px arial;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 15px;
}
#btn_start{
    background: #3bbe13;    
}
#btn_stop{
    background: #e6304f;   
}
.info{
    margin-top: 80px;
    text-align: center;    
    font:normal 13px verdana;
}
.info p{
    line-height: 25px;
}
.info a{
    color: #f05539;
}
 </style>
    <body>
        <!-- Header -->
        <div id="header">
            <div class="container">
                <h1>Mytetrax Live Video Mode</h1>
            </div>
        </div>
        <!-- ./Header -->
 
        <!-- Video Preview -->
        <div class="container">            
            <div id="video_preview">                    
                <div id="player"></div><div class="clear"></div>
                <br/><br/><br/>
                <input type="text" id="stream_url" value="rtmp://192.168.43.233:1935/live/android_test"/><br/>
                <input type="button" id="btn_start" class="" value="Start" />
                <input type="button" id="btn_stop" class="" value="Stop"/>
            </div>
            <div class="clear"></div>
        </div>
        <!-- ./Video Preview -->
 
        <div class="container">
            <div class="info"><p>
                    Press Back Button Go To the Home Page: <a href="<?php echo base_url();?>index">Back</a><br/>
                   
                </p>
            </div>
        </div>
        <script type="text/javascript">var data = [];
var jw_width = 640, jw_height = 360;
 
// Outputs some logs about jwplayer
function print(t, obj) {
    for (var a in obj) {
        if (typeof obj[a] === "object")
            print(t + '.' + a, obj[a]);
        else
            data[t + '.' + a] = obj[a];
    }
}
 
$(document).ready(function() {
 
    jwplayer('player').setup({
        wmode: 'transparent',
        width: jw_width,
        height: jw_height,
        stretching: 'exactfit'
    });
 
    $('#btn_start').click(function() {
        startPlayer($('#stream_url').val());
    });
 
    $('#btn_stop').click(function() {
        jwplayer('player').stop();
    });
 
 
 
    startPlayer($('#stream_url').val());
});
 
// Starts the flash player
function startPlayer(stream) {
 
    jwplayer('player').setup({
        height: jw_height,
        width: jw_width,
        stretching: 'exactfit',
        sources: [{
                file: stream
            }],
        rtmp: {
            bufferlength: 3
        }
    });
 
    jwplayer("player").onMeta(function(event) {
        var info = "";
        for (var key in data) {
            info += key + " = " + data[key] + "<BR>";
        }
        print("event", event);
    });
 
    jwplayer('player').play();
}</script>
    </body>
</html>