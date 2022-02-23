
<body>
<div class="container" id="ad1" style="position:fixed; z-index:1; background-color:green; width:50vw; height:8vh; opacity:0.8; margin-top:80vh; margin-left:28vw; overflow:scroll;">
<div style="float:right;">
<button class="btn-danger" onclick="hide_ad1()">X</button>
</div>
<br>
    <strong style="margin-left:15vw;"> YOUR ADVERTISEMENT HERE!! </strong>
</div>

<div class="container" id="ad2" style="position:fixed; z-index:1; background-color:green; width:15vw; height:30vh; opacity:0.7; margin-top:4vh; margin-left:80vw; overflow:scroll;">
<div style="float:right;">
<button class="btn-danger" onclick="hide_ad2()">X</button>
</div>
<br>
<div align=center style="margin-top:7vh;">
    <strong > YOUR</strong><br>
    <strong > ADVERTISEMENT</strong><br>
    <strong> HERE!!!</strong>
</div>
</div>
</body>
<script>
function hide_ad1(){
    document.getElementById("ad1").style.display = "none";
}
function hide_ad2(){
    document.getElementById("ad2").style.display = "none";
}
</script>

