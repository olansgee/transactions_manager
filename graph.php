<!DOCTYPE HTML>
<HTML>
<HEAD>
<SCRIPT type="text/javascript" src="RGraph.common.core.js" ></SCRIPT>
<SCRIPT type="text/javascript" src="RGraph.bar.js" ></SCRIPT>  
    <TITLE>Bar chart</TITLE>
</HEAD>
<BODY>

<CANVAS width="500" height="250" id="test" style="border:1px solid black"></CANVAS>
<SCRIPT type="text/javascript" charset="utf-8">
var bar = new RGraph.Bar('test', [10,30,20,10]);
bar.Set('chart.gutter', 5);
bar.Set('chart.colors', ['red']);
bar.Set('chart.title', "Sales Report" );
bar.Set('chart.labels', ["10" , "20" , "30" , "40" ]);
bar.Draw();
</SCRIPT> 
</BODY>
</HTML>
