{name}<br />
Online: {online} - {persent}%;<br />
<div id="frame">
<div id="line"></div>
</div>
<style>
* { margin:0; padding:0; }
div#frame {
    background: #ccc;
    border-radius: 4px;
    width: 200px;
    height: 25px;
}
div#line {
    background: #009900;
    width: {persent}%;
    height: 100%;
    border-radius: 4px;
}
</style>