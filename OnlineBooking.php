<!DOCTYPE HTML>
<HTML><TITLE>OnlineBookings Page</TITLE>
<HEAD>
<SCRIPT type="text/javascript" src="RGraph1/RGraph.common.core.js"></SCRIPT>
<SCRIPT type="text/javascript" src="RGraph1/RGraph.bar.js"></script>

<SCRIPT>
var date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var year = date.getFullYear();
var output= month + '/' +day + '/' + year;
function compareDate()
{
	if(Date.parse(document.form1.bookingdate.value)<Date.parse(output)){
		alert("You cannot select a date less than the current date");
		}
}
function checkNum() 
{
	x = event.charCode;
	if (( x >= 65  && x <=90) || (x >= 97 && x <=122))
	{
		alert("Enter Numeric Value");
		document.form1.num.value='';
	}
}
function total()
{
	if(document.form1.num.value>20)
	{
		alert("You cannot book more than 20 tickets at a time");
		document.form1.num.value='';
	}
	else
	document.form1.totalprice.value=(document.form1.price.value)*(document.form1.num.value);
}
function check()
{
	for( i = 0; i <= document.form1.RB.length; i++ ){

		if(document.form1.RB[0].checked==true) {
 			 document.form1.price.value=100;
		}else if(document.form1.RB[1].checked==true) {
 			 document.form1.price.value=140;
		}else if(document.form1.RB[2].checked==true) {
			 document.form1.price.value=200;
		}
}
}
function sub()
{
	if((document.form1.usrname.value!='')&&(document.form1.num.value!='')&&(Date.parse(document.form1.bookingdate.value)>Date.parse(output))&&(document.form1.sel.value!=0)&&(document.form1.timing.value!=7))
	{
		alert("Your tickets have been booked.");
	}
}
function validate()
{
	if((document.form1.sel.value==0)||(document.form1.timing.value==7)||(Date.parse(document.form1.bookingdate.value)<Date.parse(output)))
	{
		alert("Please select the date, movie name, and movie timings.");
		return false
	}
	else
	return true
}
</SCRIPT>

<STYLE type="text/css">
#submit{
margin-left:100px;
}
th{
font-size:20px;
background-color:green;
}
td{
text-align:left;
font-size:20px;
}
table{
border:1px solid green;
}
form{
float:left;
margin-right:20px;
}
p{
font-size:20px;}
h2{
background-color:green;
border:1px solid green;
margin-left:460px;}
.auto-style{
/* Chrome  */
overflow-x:-webkit-marquee;
-webkit-marquee-direction: up;
-webkit-marquee-style: scroll;
-webkit-marquee-speed:normal;
-webkit-marquee-increment: small;
-webkit-marquee-repetition: infinite;
}
</STYLE>

</HEAD>
<BODY>
<FORM name="form1" onsubmit="return validate();">
<TABLE>
<TR>
<TH colspan="2">Book Your Tickets Online</TH>
</TR>
<TD>Name</TD>
<TD><INPUT type="text" name="usrname" placeholder="Enter Your Name" required></TD>
</TR>
<TR> 
<TD> Date of Bookings</TD>
<TD><INPUT type="date" id="bookingdate" required 
onchange="compareDate();"></TD>
</TR>
<TR>
<TD>Movie</TD>
<TD><SELECT id="sel">
<OPTION value="0">Select Movie</OPTION>
<OPTGROUP label="Drama">
<OPTION value="1">Nightmare</OPTION>
<OPTION value="2">Along Polly Came</OPTION>
</OPTGROUP>
<OPTGROUP label="Thriller"> 
<OPTION value="3">Source Code</OPTION>
<OPTION value="4">If only</OPTION>
</OPTGROUP>
<OPTGROUP label="Romantic">
<OPTION value="5">A walk to remember</OPTION>
<OPTION value="6">Angel</OPTION>
</OPTGROUP>
</SELECT></TD>
</TR>
<TR>
<TD>Show Timings</TD>
<TD><SELECT id="timing">
<OPTION value="7">Select Time</OPTION>
<OPTION value="8">10:30AM</OPTION>
   <OPTION value="9">5:30PM</OPTION> 
<OPTION value="10">12:30PM</OPTION> 
</SELECT></TD>
</TR>
<TR>
<TD>Select Class</TD>
<TD>
<INPUT type="Radio" name="RB" required" onclick="check();">Platinum</INPUT>
<INPUT type="Radio" name="RB" required onclick="check();">Gold</INPUT>
<INPUT type="Radio" name="RB" required onclick="check();">Exclusive</INPUT>
</TD>
</TR>
<TR>
<TD>Price </TD>
<TD><INPUT type="text" name="price" disabled> </TD>
</TR>
<TR>
<TD>Number of Tickets</TD> 
<TD><INPUT type="text" name="num" placeholder="Enter Tickets" required onchange="total();" onkeypress="checkNum();"> </TD>
</TR>
<TR>
<TD>Total Price</TD> 
<TD><INPUT TYPE="text" NAME="totalprice" disabled> </TD> 
</TR>
<TR>
<TD>
<INPUT ID="submit" type="submit" onclick="sub();"></Td><Td>
<INPUT type="reset">
</TD>
</TR>
</TABLE>
</FORM>
<H2>Alerts & Updates</H2>
<DIV class="auto-style">
<P>New Payment Options has been introduced for ticket bookings.</P>
<P>Mobile Booking is now resumed w.e.f. 05-April-2012.</P>
<P>ID proof is required for getting student concession on tickets.</P>
<P>Ticket Bookings On Mobile: Now book your movie ticket -ANYWHERE ANYTIME through your Mobile Phones. </P>
<P>You are advised not to carry inflammable/dangerous/explosive articles as part of their luggage and also to desist from smoking in the movie halls. Please update your mobile number in our profile to receive SMS alerts for your ticket booking.</P>
<P>Never purchase e-ticket from unauthorized agents or persons.</P>
<P>No refund will be granted on cancellation of tickets .</P></DIV>
<br><br><br>
<h1> Movie Ratings</h1>
<canvas width="900" height="250" id="test" style="border:1px solid black"></canvas>
<script type="text/javascript" charset="utf-8">
var bar = new RGraph.Bar('test', [4,2.5,2.5,3,4,3.5]);
bar.Set('chart.gutter', 5);
bar.Set('chart.colors', ['green']);
bar.Set('chart.labels', ["Source Code" , "if Only" , "Angel" , "Nightmare","Along Polly Came","A Walk to Remember" ]);
bar.Draw();
</script>


</BODY>
</HTML>
