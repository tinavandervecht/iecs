(function(){

  //AJAX CMS FUNCTIONALITY

    var boxes = document.querySelectorAll('.estiimat'),
        rows = document.querySelectorAll('.new'),
        select = document.querySelector('#sort'),
        search = document.querySelector('#search'),
        centerBox = document.querySelector('#centerIt'),
        table = document.querySelector('tbody'),
        httpRequest;


  function ajaxCall(){
    httpRequest = new XMLHttpRequest();
    if(httpRequest===null){
    	alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
      return;
		}

		var url = base_url+"/admin/ajaxEstimates?value=" + select.value + "&search="+search.value;
    //console.log(url);

		httpRequest.onreadystatechange = updatePage;
		httpRequest.open("get", url);
		httpRequest.send();
  }

  function updatePage(){
    if(httpRequest.readyState===4 || httpRequest.readyState==="complete"){
			//console.log(httpRequest.responseText);
      if (httpRequest.responseText==='false'){
        centerBox.innerHTML = "";
        if (table) {
            table.innerHTML = "";
        }
        return;
      }
      else{
        var json = JSON.parse(httpRequest.responseText);
        //console.log(json.length);
        //console.log(json[3].estimate_name);
        //console.log(json[4].estimate_name);

        //DELETE WHATS CURRENTLY IN THE BOXES AND TABLES
        centerBox.innerHTML = "";
        table.innerHTML = "";


        if (json.length<4) { //IF THERE ARE LESS THEN 5 ENTRIES YOU DON'T NEED TO RENDER THE TABLE.
          for (var i = 0; i < json.length; i++) {
            buildBoxes(json, i);
          }
        }
        else if(json.length>=4 && json.length<12){ //IF THE TABLE WONT BE ENTIRELY RENDERED
          for (var i = 0; i < 4; i++) {
            buildBoxes(json, i);
          }
          for (var i = 4; i < json.length; i++) {
            buildTables(json, i);
          }

        }
        else{ //THE TABLE WILL BE ENTIRELY RENDERED
          for (var i = 0; i < 4; i++) {
            buildBoxes(json, i);
          }

          for (var i = 4; i < 12; i++) {
            buildTables(json, i);
          }
        }
      }


		}
  }

  function buildBoxes(json, i){ //FUNCTION FOR RENDERING OUT THE HTML FOR THE NEW BOXES
    var div = document.createElement('div');
    div.classList.add("estiimat", "clearfix");
    var div2 = document.createElement('div');
    div2.className = "title";
    var titleH3 = document.createElement('h3');
    titleH3.appendChild(document.createTextNode(json[i].company_name));
    var titleH4 = document.createElement('h4');
    titleH4.appendChild(document.createTextNode(json[i].estimate_name));
    div2.appendChild(titleH3);
    div2.appendChild(titleH4);
    var p1 = document.createElement('p');
    var p2 = document.createElement('p');
    var p3 = document.createElement('p');
    var span1 = document.createElement('span');
    span1.className = "edit";
    span1.appendChild(document.createTextNode('Date Edited: '+json[i].estimate_modifiedDate.substring(0, 10)));
    p1.appendChild(span1);
    var span2 = document.createElement('span');
    span2.classList.add("block", "est");
    span2.appendChild(document.createTextNode('Recommended Block: CC35'));
    p2.appendChild(span2);
    var span3 = document.createElement('span');
    span3.className = "factor";
    span3.appendChild(document.createTextNode('Safety Factor: 2.3'));
    p3.appendChild(span3);
    var p4 = document.createElement('p');
    var a = document.createElement('a');
    a.className = "greyButton";
    a.href = base_url+"/admin/summary/" + json[i].estimate_id;
    a.appendChild(document.createTextNode('Review'));
    p4.appendChild(a);
    div.appendChild(div2);
    div.appendChild(p1);
    div.appendChild(p2);
    div.appendChild(p3);
    div.appendChild(p4);
    centerBox.appendChild(div);
  }

  function buildTables(json, i){ //FUNCTION FOR RENDERING OUT TABLE ENTRIES.
    var tr = document.createElement('tr');
    tr.className = "new";
    var td1 = document.createElement('td');
    td1.appendChild(document.createTextNode(""));
    var td2 = document.createElement('td');
    td2.appendChild(document.createTextNode(json[i].company_name));
    var td3 = document.createElement('td');
    td3.appendChild(document.createTextNode(json[i].estimate_name));
    var td4 = document.createElement('td');
    td4.appendChild(document.createTextNode(json[i].estimate_modifiedDate.substring(0, 10)));
    var td5 = document.createElement('td');
    td5.appendChild(document.createTextNode("BLOCK SIZE"));
    var td6 = document.createElement('td');
    td6.appendChild(document.createTextNode("Factoids"));
    var td7 = document.createElement('td');
    var a = document.createElement('a');
    a.className = "greyButton";
    a.href = base_url+"/admin/summary/" + json[i].estimate_id;
    a.appendChild(document.createTextNode('REVIEW'));
    td7.appendChild(a);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    table.appendChild(tr);
  }


  select.addEventListener('change', ajaxCall, false);
  search.addEventListener('input', ajaxCall, false);


})();
