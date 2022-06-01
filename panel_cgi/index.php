<head>
<?phph header('Content-Type: text/html; charset=utf-8');?>
 <script type="text/javascript"  src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
var videoo;


   
</script>

<style>
#logo {
   position:absolute;
   top:25px;
   right:50px;
	width: 300px;
	height: 150px;
 background-size:contain;
background-repeat: no-repeat;
background-position: center top;

  }
#animacja{
    width: 1300px;
    height: 100px;
     background-size:contain;
    position: absolute;
	top: 50px;
background-repeat: no-repeat;
background-position: center top;
left: 50%;
 -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
	
 }
#pasek_dol{
width: 1300px;
height: 150px;
border-radius: 50px;
 background-size:contain;
position: absolute;
bottom: -50px;
display: table;

 -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
text-align: center;
text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#FFFFFF;letter-spacing:1pt;word-spacing:2pt;font-size:26px;font-family:arial, helvetica, sans-serif;line-height:1;

background-repeat: no-repeat;
background-position: center top;
}

#dol_reklama{
width: 1300px;
height: 300px;
border-radius: 50px;
 background-size:contain;
position: absolute;
bottom: -50px;

left: 50%;
 -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
text-align: center;
text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#FFFFFF;letter-spacing:1pt;word-spacing:2pt;font-size:26px;font-family:arial, helvetica, sans-serif;line-height:1;

background-repeat: no-repeat;
background-position: center top;
}

#tekst_pasek_dol{
display: table-cell;
    vertical-align: middle;
	padding: 50px;
	text-align: center;
}


#ekran{width:1920px;
		height:1080px;
		margin: auto;
	border: none;
 position: relative;
}
</style>

 <script type="text/javascript">
	
          function loadScript(location, runOnLoad) {
                // Check for existing script element and delete it if it exists
                var js = document.getElementById("sandboxScript");
				
                if(js) {
                    document.head.removeChild(js);
                    sandbox = undefined;
					
                    console.info("---------- Script refreshed ----------");
                }
               
                // Create new script element and load a script into it
                js = document.createElement("script");
                document.head.appendChild(js);
                if(runOnLoad)
                    js.onload = function() { videoo = video_baza; 
									
									
					
					
									
				};
							
														
                js.src = location;
                js.id = "sandboxScript";
				js.type = "text/javascript";
 				console.info("---------- uruchomiony----------");
            }
           
            // Make sure script has loaded and display an alert if it has not
            function runScript() {
                if(typeof sandbox !== "undefined") {
                    sandbox();
                } else {
                    window.alert("The script has not been loaded yet!");
                }
            }

        </script>

<script type="text/javascript">
 function start() {
	
	loadScript('http://localhost/foo.php', true);
	
  setTimeout(start, 1000);
}


				
start(); 



</script>
</head>
<body style="background-color:rgba(0,0,255,0);" >        
<div id="ekran">
<div id="video-div">

</div>
<div id="animacja"></div>
<div id="pasek_dol"><div id="tekst_pasek_dol"></div></div>
<div id="dol_reklama"></div>
<div id="logo"></div>
</div>
       </body>

<script type="text/javascript">
//var video = document.getElementById("Video1");
	
						



									//video.autoplay = true;
									//video.load();
									//  video.playbackRate = 0.5; 
								
									//video.addEventListener('ended',myhandler,false);
				//function myhandler(e) {
					//ukryj('#video-div');}


// boot up the first call

		
</script>

