<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <?php 
    include "validation.php";
    ?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Voice Recorder and Changer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->

    <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
    <!-- Place favicon.ico in the root directory -->

  
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="normalize-5.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="osd.js"></script>
    </head>
    <style>
    html,body{
		padding: 0 !important;
		margin: 0 !important;
	}
		body{
			background: url("microphone.jpg") no-repeat fixed center !important;
		}
</style>
   <body>
   <br><br><br><br>
   <form action="search.php" class="container">
      <button type="submit" class="btn btn-primary btn-lg">Back To Search</button>
    </form>
    
   <br>
     <?php /* session_start(); */
     $un = $_GET['un'];
        if ($_SESSION['logged_in']!=true){
            session_destroy();
            header("Location: index.php");

        }
        else{
            ;
        }
            
    ?>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: #efefef;
    }
    html {
      box-sizing: border-box;
    }
    *, *:before, *:after {
      box-sizing: inherit;
    }
    .voice-ctn {
      background:white;
      border-radius:1px;
      box-shadow: 0 1px 3px 0 rgba(0,0,0,.14);
    }
    .voice-ctn .header {
      border-bottom: 1px solid lightgrey;
      padding: 0.5rem;
    }
    #inputOutputArea {
      width: 900px;
      margin: 0 auto;
    }
    @media screen and (max-width: 960px) {
      .voice-ctn button { padding:0.4rem; font-size:0.8rem; }
      #inputOutputArea {
        flex-direction: column;
        width: unset;
        margin: unset;
      }
    }
      
    .blink {
      animation: blinker 1s step-start infinite;
    }
    @keyframes blinker {
      50% {
        color: black;
      }
    }
    </style>


    <main style="display:flex; flex-direction:column;">
      
       
      <div id="inputOutputArea" style="display:flex; padding:0.5rem; min-height:130px;">

        <div id="inputArea" style="flex:1; margin: 0.5rem;">
          <div class="voice-ctn" style="display:flex; flex-direction:column; height:100%;">
            <div class="header" style="text-align:center; font-weight:bold;">Input Audio</div>
            <div style="text-align:center; flex-grow:1; display:flex; min-height: 100px;">
              <div style="margin:auto; position:relative;">
              <h3 style="color: #337ab7">Send Encrypted Audio to: <?php echo $_GET['un']?></h3>
                <button id="microphone-button" style="padding: 0.5rem;" onclick="recordFromMicrophone();" type="button" class="btn btn-primary btn-lg">
                  <span class="start">🎙Record</span><span class="mic-enable" style="display:none ;">please enable microphone</span><span class="stop" style="display:none;">(<span class="time"></span>) stop recording</span>
                </button>
                  <div id="audio-load-success" style="z-index:10; color: black; text-align: center;position: absolute;top: 0;left: 0;right: 0;bottom: 0;background: #ffffff;margin: 0; display:none;">
                  <div>
                  <!-- <p>Success</p> -->
                  <button style="width: 320px" type="button" class="btn btn-info" onclick="this.parentNode.parentNode.style.display='none';DsbSave();">Recorded! Record Again?</button>
                    <!-- <p style="margin-top: 0;margin-bottom: 0.3rem;width:150px">Success!</p> -->
                  </div>
                </div>
                <div id="audio-loading-input" style="z-index:10; color: black; text-align: center;position: absolute;top: 0;left: 0;right: 0;bottom: 0;background: #ffffff;margin: 0; display:none;">
                  <div style="margin:auto;">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="outputArea" style="flex:1; margin: 0.5rem;">
          <div class="output-voice-ctn voice-ctn" style="display:flex; flex-direction:column; height:100%; opacity:0.3;">
            <div id="voice-output-loader" style="display:none; margin:auto; text-align:center; padding: 1rem;">
              <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
              <div style="font-size: 80%;">This could take a while...</div>
              <div style="font-size:65%; opacity: 0.6; margin-top: 0.1rem;" id="effectLoadProgressMessage">applying effect 1/1</div>
            </div>
            <div id="voice-output-area" style="display:flex; flex-direction:column;">
              <div class="header" style="text-align:center; font-weight:bold;">Output Audio</div>
              <div style="text-align:center; flex-grow:1; margin:1rem 0;">
                <audio id="output-audio-tag" controls="controls"></audio>
                <br><button type="button" class="btn btn-primary btn-lg" id="regenerateAudioButton" style="margin:0 auto; margin-bottom: 0.3rem;" onclick="loadOutputAudio();EnbSave();">Change Voice</button>
                <button type="button" class="btn btn-primary btn-lg" id="saveButton" disabled style="margin:0 auto; margin-bottom: 0.3rem;" onclick="SaveRec();" >Send</button>
              <!--  <a style="margin: 0 auto; width: min-content;" href="#" id="download-output-audio-link" download="output.wav"><button>download</button></a>-->
              </div>
            </div>
          </div>
        </div>

      </div>

      <div id="effectsAdder" style="text-align:center;display:none;">
        <select id="effectsAdderSelect" onchange="if(this.value == 'RANDOM') { makeRandomVoice() } else if(this.value) { addEffect(this.value, null, 'start'); updateEffectsData(); } this.value='';" style="padding: 1rem 2rem;">
        <option value="pitchShift">Pitch Shift</option></select>
      </div>

      <style>
      #effectsList {
        width: 95%;
        max-width: 600px;
        margin:0 auto;
      }
      .effect {
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.14);
        background:white;
        margin-top:1rem;
      }
      .effect .header {
        display:flex;
        border-bottom: 1px solid lightgrey;
        padding:0.8rem;
        position:relative;
      }
      .effect .header .title {
        flex-grow:1;
        font-weight:bold;
        line-height: 1.2rem;
      }
      .effect .header .handle {
        cursor: move;
      }
      .effect .header .icon {
        padding: 0 5px;
        border: 1px solid black;
        opacity:0.4;
        border-radius:2px;
      }
      .effect .header .icon:hover {
        background:#1cbced;
      }
      .effect .description {
        border-bottom: 1px solid lightgrey;
        padding:0.8rem;
      }
      .effect .params {
        padding:0.8rem;
      }
      .effect .param {
        display:flex;
      }
      .effect .param .input-wrapper {
        flex-grow:1;
        display: flex;
      }
      .effect .param .name {
        padding: 0.2rem;
      }
      .effect .param input, #effectsList .effect .param select {
        width:100%;
      }
      .effect .param:not(:first-child) {
        margin-top: 0.4rem;
      }


      .effect .title-menu {
        padding: 5px 0px;
        position: absolute;
        background: #fff;
        box-shadow: 0 4px 12px 1px rgba(0,0,0,.14);
        border-radius: 3px;
        z-index: 10;
        right: 0;
        top: 0;
        display: none;
      }
      .effect .title-menu.visible {
        display: block;
      }
      .effect .title-menu .menu-item {
        padding: 8px 16px;
        line-height: 24px;
        cursor: pointer;
      }
      .effect .title-menu .menu-item:hover {
        background: #f2f4f6;
      }

      .range-param-display:hover {
        background: #f2f4f6;
      }
      </style>


      <script>
      window.visibleTransformTitleMenu = null;
      window.addEventListener('click', function(e) {
        if(window.visibleTransformTitleMenu) {
          window.visibleTransformTitleMenu.classList.remove("visible");
          visibleTransformTitleMenu = null;
        }
      });
      </script>


      
<div id="loadingEffectsNotice" style=" text-align: center; margin-top: 2rem; font-weight: bold; font-size: 3rem;">Loading...</div>

<div id="effectsList" style="min-height:100px;"></div>


      
    </main>
      
    <br><br><br>


    <script>


      const effectSpecs = [
        {
          name: "pitchShift",
          title: "Pitch Shift",
          description: "",
          params: [
            {name:"shift", title:"Shift", type:"range", min:-1, max:1, step:0.1, value:0},
          ]
        },
      ];
      const effectSpecsMap = effectSpecs.reduce((a,v) => (a[v.name]=v, a), {});

      effectsAdderSelect.innerHTML = `<option value="">Click to add an effect...</option>`+effectSpecs.map(e => `<option value="${e.name}">${e.title}</option>`).join("")+`<option value="RANDOM">Make a Random Voice</option>`;

      let defaultUrlData = `{"effects":[{"name":"pitchShift", "params":{"shift":0}}], "version":1}`;
      if(!window.location.hash.slice(3).trim()) window.location.hash = "#!/"+defaultUrlData;
      let initialUrlData = JSON.parse(decodeURIComponent(window.location.hash.slice(3)));
      window.effects = initialUrlData.effects;

      window.addEventListener('DOMContentLoaded', function() {
        console.log("inital effects:", window.effects);
        for(let {name, params} of window.effects) {
          //let paramsMap = params.reduce((a,v) => (a[v.name]=v.value, a), {});
          addEffect(name, params);
        }
      });

      function addEffect(name, params, placement="end") {
        params = JSON.parse(JSON.stringify(params));

        if(!params) params = effectSpecsMap[name].params.reduce((a,v) => (a[v.name]=v.value, a), {});

        // make sure all params are included. add defaults for ones that are not (this allows me to add new parameters without things breaking)
        let gotAlready = Object.keys(params);
        let dontGot = effectSpecsMap[name].params.map(p => p.name).filter(n => !gotAlready.includes(n));
        if(dontGot.length > 0) {
          console.log("adding defaults for:", dontGot, `(${name} effect)`);
          let defaults = effectSpecsMap[name].params.reduce((a,v) => (a[v.name]=v.value, a), {});
          for(let name of dontGot) {
            params[name] = defaults[name];
          }
        }

        let html = generateEffectHtml(effectSpecsMap[name], params);
        effectsList.insertAdjacentHTML(placement == "start" ? "afterbegin" : "beforeend", html);

        updateEffectsData();
        // if(typeof globalAudioBuffer !== 'undefined' && globalAudioBuffer) {
        //   loadOutputAudio();
        // }
      }

      function updateEffectsData() {
        //var urlInputEl=null;
        window.effects = [...effectsList.querySelectorAll(".effect")].map(el => ({name:el.dataset.effect, params:JSON.parse(decodeURIComponent(el.dataset.params))}));
        if(window.effects.length === 0) window.location.hash = "";
        else window.location.hash = "#!/"+JSON.stringify({effects:window.effects, version:1});

        //urlInputEl.value = window.location.href;
        

        if(window.globalAudioBuffer) {
          regenerateAudioButton.classList.add("blink");
          regenerateAudioButton.style.fontWeight = "bold";
        }
      }

      function generateParamHtml(p, value) {
        value = value !== undefined ? value : p.value;
        let onChangeEvent = "this.closest('.effect').dataset.params = encodeURIComponent(JSON.stringify([...this.closest('.effect').querySelectorAll('.param input, .param select')].reduce((a,el) => (a[el.dataset.name]=Number(el.value)+'' === el.value ? Number(el.value) : el.value, a), {}))); updateEffectsData();";
        let inputHtml;
        if(p.type === "range") {
          inputHtml = `<input data-name="${p.name}" id="slider" onchange="${onChangeEvent}" type="range" value="${value}" step="${p.step}" min="${p.min}" max="${p.max}" oninput="this.nextElementSibling.firstChild.innerHTML=${p.valueToHTML ? "("+p.valueToHTML.toString()+")(this.value)" : "this.value"};"/><div class="range-param-display" onclick="let n = prompt('Enter a value for this parameter:'); if(n !== null && n.trim() !== '' && !isNaN(Number(n))) { this.previousElementSibling.value=Number(n); this.firstChild.innerText=Number(n); this.previousElementSibling.onchange(); }" style="cursor:pointer; width:min-content; font-family:monospace; text-align: center; padding: 0.3rem;"><span id='sv'>${value}</span></div>`;
        } else if(p.type === "input") {
          inputHtml = `<input data-name="${p.name}" onchange="${onChangeEvent}" type="text" value="${value}"/>`;
        } else if(p.type === "select") {
          inputHtml = `<select data-name="${p.name}" onchange="${onChangeEvent}">
            ${p.options.map(o => `<option value="${o.value}" ${value === o.value ? "selected" : ""}>${o.label}</option>`).join("")}
          </select>`;
        }
        
        return `<div class="param">
          <div class="name">${p.title}: &nbsp;</div>
          <div class="input-wrapper">${inputHtml}</div>
        </div>`;
      }
      function generateEffectHtml(e, params={}) {
        let paramHtml = e.params.map((p,i) => generateParamHtml(p, params[p.name])).join("");
        

        return `<div class="effect" data-effect="${e.name}" data-params="${encodeURIComponent(JSON.stringify(params))}">
          <div class="header">
            <div class="title">${e.title}</div>
                    
            <div class="title-menu">
              <div class="menu-item" onclick="moveEffectEl(this.closest('.effect'), 'up')">move up</div>
              <div class="menu-item" onclick="moveEffectEl(this.closest('.effect'), 'down')">move down</div>
            </div>
          </div>
          <div class="description">${e.description}</div>
          <div class="params">
            ${paramHtml}
          </div>
        </div>`;
      }

      // <div class="icon remove" style="cursor:pointer; width: 1.7rem; text-align: center;" onclick="this.closest('.effect').remove(); updateEffectsData();" title="delete this effect">⨯</div>

      function moveEffectEl(el, direction) {
        let changed = false;
        if(direction === "down" && el.nextElementSibling) {
          el.nextElementSibling.after(el);
          changed = true;
        } else if(direction === "up" && el.previousElementSibling) {
          el.parentNode.insertBefore(el, el.previousElementSibling);
          changed = true;
        }
        if(changed && window.globalAudioBuffer) {
          regenerateAudioButton.classList.add("blink");
          regenerateAudioButton.style.fontWeight = "bold";
        }
      }


      let alreadyLoadingOutputAudio = false;
      async function loadOutputAudio() {
        if(typeof globalAudioBuffer === 'undefined' || !globalAudioBuffer) {
          alert("Have you chosen an input audio file, or recorded an audio clip using your microphone? Please do that first ");
          document.getElementById("saveButton").disabled = true;
          return;
        }
        if(alreadyLoadingOutputAudio) {
          return;
        }
        alreadyLoadingOutputAudio = true;
        let $ = document.querySelector.bind(document);

        regenerateAudioButton.classList.remove("blink");
        regenerateAudioButton.style.fontWeight = "unset";

        $(".output-voice-ctn").style.opacity = 1;
        $("#voice-output-loader").style.display = "";
        $("#voice-output-area").style.display = "none";

        let outputAudioBuffer = globalAudioBuffer;
        let i = 0;
        for(let effect of window.effects) {
          effectLoadProgressMessage.innerHTML = `applying effect ${i+1}/${window.effects.length}...`;
          // let params = effect.params.reduce((a, value, i) => (a[effectSpecsMap[effect.name].params[i].name]=value, a), {});
          // let paramsMap = effect.params.reduce((a,v) => (a[v.name]=v.value, a), {});
          let params = JSON.parse(JSON.stringify(effect.params));
          outputAudioBuffer = await window[effect.name+"Transformer"](outputAudioBuffer, params);
          i++;
        }
        effectLoadProgressMessage.innerHTML = `converting buffer to a .wav file...`;
        let outputWavBlob = await audioBufferToWaveBlob(outputAudioBuffer)
        let audioUrl = window.URL.createObjectURL(outputWavBlob);
        let audioTag = $("#output-audio-tag");
        audioTag.src = audioUrl;
        //audioTag.play();

       // $("#download-output-audio-link").href = audioUrl;

        $("#voice-output-loader").style.display = "none";
        $("#voice-output-area").style.display = "";

        alreadyLoadingOutputAudio = false;

       
      }

      async function SaveRec()
      {
        if(typeof globalAudioBuffer === 'undefined' || !globalAudioBuffer) {
          alert("Have you chosen an input audio file, or recorded an audio clip using your microphone? Please do that first ");
        }
        else
        {
          var today = new Date();
          var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
          var time = today.getHours() + "_" + today.getMinutes() + "_" + today.getSeconds();
          var dateTime = date+'-'+time;
          var file_name=dateTime+'.mp3'

            let outputAudioBuffer = globalAudioBuffer;

            let i = 0;
            for(let effect of window.effects) {

                // let params = effect.params.reduce((a, value, i) => (a[effectSpecsMap[effect.name].params[i].name]=value, a), {});
                // let paramsMap = effect.params.reduce((a,v) => (a[v.name]=v.value, a), {});
                let params = JSON.parse(JSON.stringify(effect.params));
                outputAudioBuffer = await window[effect.name+"Transformer"](outputAudioBuffer, params);
                i++;
            }
          let outputWavBlob = await audioBufferToWaveBlob(outputAudioBuffer)

              let formData = new FormData();        
              formData.append("record", outputWavBlob, file_name);
              let response = await fetch('db_save.php?un=<?php echo "$un" ?>', {
                  method: 'POST',
                    body: formData
                  });
                  let result = await response.json();
                  //let result = await response;
                  alert(result.data);
                  if(result.status=='1')
                   document.getElementById("saveButton").disabled = true;
                   window.location.href="userprofile.php?un=<?php echo $_GET['un']?>"

        }


      }

      function EnbSave()
      {
        document.getElementById("saveButton").disabled = false;

      }

       function DsbSave()
      {
        document.getElementById("saveButton").disabled = true;
       
        globalAudioBuffer=null;

         window.location.hash=""; 
         document.getElementById('slider').value=0;
         document.getElementById('sv').innerHTML =0;
    

      } 



      // Microphone
      let currentlyRecording = false;
      let maxRecordingSeconds = 5*60;
      async function recordFromMicrophone() {

        window.location.hash=""; 

        let $ = document.querySelector.bind(document);

        if(currentlyRecording) {
          return;
        }
        currentlyRecording = true;

        // Change, button, start timer:
        var micButtonCssText = $("#microphone-button").style.cssText;
        $("#microphone-button").style.cssText = "background:#e71010; color:white;";
        $("#microphone-button .start").style.cssText = "display:none;"
        $("#microphone-button .mic-enable").style.cssText = "display:initial;"

        let chunks = [];
        let stream = await navigator.mediaDevices.getUserMedia({ audio:true, video:false });
        let mediaRecorder = new MediaRecorder(stream, {mimeType:"video/webm"});

        mediaRecorder.start();
        let timerInterval;

        mediaRecorder.ondataavailable = function(e) { chunks.push(e.data); };
        mediaRecorder.onstart = function() {
          console.log('Started, state = ',mediaRecorder.state);

          $("#microphone-button .mic-enable").style.cssText = "display:none;";
          $("#microphone-button .stop").style.cssText = "display:initial;";

          var seconds = 0;
          $("#microphone-button .time").innerText = seconds;
          timerInterval = setInterval(() => { seconds++; $("#microphone-button .time").innerText = seconds; }, 1000);


          let stopFn = function() {
            mediaRecorder.stop();
            $("#microphone-button").removeEventListener("click", stopFn);
            clearTimeout(maxLengthTimeout);
          };
          $("#microphone-button").addEventListener("click", stopFn)
          let maxLengthTimeout = setTimeout(stopFn, maxRecordingSeconds*1000);

        };

        mediaRecorder.onerror = function(e) { console.log('Error: ',e); };
        mediaRecorder.onwarning = function(e) { console.log('Warning: ', e); };

        mediaRecorder.onstop = async function() {
          console.log('Stopped, state = ' + mediaRecorder.state);

          let blob = new Blob(chunks, { type: mediaRecorder.mimeType });//+'; codecs=opus' });//
          let audioURL = window.URL.createObjectURL(blob);



          let arrayBuffer = await (await fetch(audioURL)).arrayBuffer();

          try {
            globalAudioBuffer = await (new AudioContext()).decodeAudioData(arrayBuffer);
            $("#audio-load-success").style.display = "flex";
            loadOutputAudio();
          } catch(e) {
            alert("Sorry, your browser doesn't support a crucial feature needed to allow you to record using your device's microphone. You should use Chrome or Firefox if you want the best audio support, and ensure you're using the *latest version* of your browser of choice. Chrome and Firefox update automatically, but you may need to completely close down the browser and potentially restart your device to 'force' it to update itself to the latest version.");
          }

          // Change, button, end timer:
          $("#microphone-button").style.cssText = micButtonCssText;
          $("#microphone-button .start").style.cssText = "display:initial;";
          $("#microphone-button .stop").style.cssText = "display:none;";
          clearInterval(timerInterval);

          currentlyRecording = false;

        }


      }
    </script>


    <script src="dragula.js"></script>
    <link rel="stylesheet" type="text/css" href="dragula.css">

    <script src="helpers.js"></script>
    <script src="jungle.js"></script>
    <script src="vocoder.js"></script>
    <script src="tuna.js"></script>

    <script>self.AudioContext = (self.AudioContext || self.webkitAudioContext);</script>

    <script src="pitchShiftTransformer.js"></script>
  

    <script>
      console.log(`Notes:
       - remember that if you change voices, it will "break" links
      `);
    </script>

    <script>
      dragula([effectsList], {
        moves: function (el, container, handle) {
          return handle.classList.contains('handle');
        }
      }).on('drop', function (el) {
        console.log("drop:", el);
        updateEffectsData();
      });
    </script>

    <style>
      .lds-ring { display: inline-block; position: relative; width: 64px; height: 64px; }
      .lds-ring div { box-sizing: border-box; display: block; position: absolute; width: 51px; height: 51px; margin: 6px; border: 6px solid #444; border-radius: 50%; animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite; border-color: #444 transparent transparent transparent; }
      .lds-ring div:nth-child(1) { animation-delay: -0.45s; }
      .lds-ring div:nth-child(2) { animation-delay: -0.3s; }
      .lds-ring div:nth-child(3) { animation-delay: -0.15s; }
      @keyframes lds-ring { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
      
    <script>
      loadingEffectsNotice.remove();
    </script>



    <script>
      // COMPATABILITY TESTING:
      try {

        var str = "";
        str += "\n(async () => { await new Promise(resolve => setTimeout(resolve, 500)); console.log('async/await is supported'); })();";
        str += "\nlet arr = [1,2,3]; for(let a of arr) { arr[0]+=a; }; console.log('let a of arr supported');";
        str += "\nvar m = [1,2,3].map(n => n+1); console.log('arrow functions supported');";
        str += "\nvar k = [...[1,2,3]]; console.log('spreading supported');";
        str += "\nvar a = (function(a=3) { return a+1; })(); console.log('default arguments supported');";

        window.eval(str);

      } catch(e) {
        var message = " Sorry! Voice Recorder  and Changer uses cutting edge browser features that are only available in the latest versions of Chrome and Firefox. All modern browsers will eventually be supported, but for now you'll need to use one of those two. Sorry again for the inconvenience!";
        window.alert(message);
      }
    </script>


    <!-- <script src="/upup.min.js"></script> -->
    <script>
      // UpUp.start({
      //   'content-url': '/maker',
      //   'assets': [
      //     'normalize.min.css',
      //   ]
      // });
    </script>
    
    

  

