
/*
<script>
var x = "<?php echo $x; ?>";
</script>

Use the above in page to set JS variables via php on pageload or call to database.
*/

(function(){

var jsonData;
/*VARIABLE DECLARATIONS*/
var name;
var city;
var engineer;
var startDate;
var address;
/*FLOW AND VELOCITY*/
var maxFlow; //Cubic meters per second
var maxVelocity; //Meters per seconds
/*SLOPES*/
var bedSlope; //Percent
var sideSlope; //Ratio
var frictionAngle; //Degrees,  note: Defaults to 30 degrees
/*TYPES OF FLOW*/
var flowType; //0 : normal, 1 : overtopping, 2 : sub-critical, 3 : hydraulic, 4 : jump, 5 : impinging, 6 : bridge/culvert, 7 : undulating trans critical
var concreteDensity; //Defaults to 2.4 gravity, cannot be changed by user
/*BED WIDTH AND ALIGNMENT*/
var bedWidth; //Meters
var alignment; //Defaults to Straight, opens more options if !straight
var radiusAtCrest; //Meters, ONLY AVAILABLE IF alignment != straight
/*CHANNEL SPECIFICATIONS*/
var chuteLength; // Meters, ONLY AVAILABLE IF alignment != straight
var channelDepth;// Meters, ONLY AVAILABLE IF alignment != straight
var topWidth; // Meters, ONLY AVAILABLE IF alignment != straight
/*ENVIRONMENT*/
var outletSource; //River, manhole, etc.
var soilType; //Soil type and related conditions

function continue(data){
if(data){/*IF DATA IS NOT NULL*/
console.log(data);
}else{
  alert("An error has occurred! Please try again later.")
}
}

function quoteJax(){
  var url = base_url+"/quotes/ajaxSummary?id=" + parseInt(base_url);
  console.log(base_url);
  var httpReq = new XMLHttpRequest();
  if(httpReq===null){
		alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
		return;
	}
	httpReq.onreadystatechange = assignData();
		httpReq.open("get", url);
		httpReq.send();
  }

  assignData(){
    if(httpReq.readyState===4 || httpReq.readyState==="complete"){
      //console.log(httpReq.responseText);
      if (!(httpReq.responseText)){
        return;
      }
      else{
        jsonData = JSON.parse(httpReq.responseText);
        continue(jsonData);
        return;
      }
    }
  }
});
