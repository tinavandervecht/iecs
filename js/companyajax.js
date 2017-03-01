(function(){
    var boxes = document.querySelectorAll('.companii'),
        select = document.querySelector('#sort'),
        search = document.querySelector('#search'),
        centerBox = document.querySelector('#row1'),
        httpRequest;


  function ajaxCall(){
    httpRequest = new XMLHttpRequest();
    if(httpRequest===null){
			alert("Error! Please update your browser.");
			return;
		}


		var url = base_url+"/admin/ajaxCompanies?value=" + select.value + "&search="+search.value;
    //console.log(url);

		httpRequest.onreadystatechange = updatePage;
		httpRequest.open("post", url, true);
		httpRequest.send();
  }

  function updatePage(){
    if(httpRequest.readyState===4 || httpRequest.readyState==="complete"){
			//console.log(httpRequest.responseText);
      if (httpRequest.responseText==='false'){
        centerBox.innerHTML = "";
        return;
      }
      else{
        var json = JSON.parse(httpRequest.responseText);
        //console.log(json.length);
        //console.log(json[3].estimate_name);
        //console.log(json[4].estimate_name);
        centerBox.innerHTML = "";

        if (json.length < 8){
          for (var i = 0; i < json.length; i++) {
            buildBoxes(json, i);
          }
        }
        else{
          for (var i = 0; i < 8; i++) {
            buildBoxes(json, i);
          }
        }
      }


		}
  }

  function buildBoxes(json, i){

    var div = document.createElement('div');
    div.classList.add('companii', 'clearfix');
    var img = document.createElement('img');
    img.src = img_url+"img/default_dude_img.png";
    img.alt = "Profile Picture";
    var div2 = document.createElement('div');
    div2.className = "title";
    var h3 = document.createElement('h3');
    h3.appendChild(document.createTextNode(json[i].company_name));
    var h4 = document.createElement('h4');
    h4.appendChild(document.createTextNode(json[i].company_contactName));
    div2.appendChild(h3);
    div2.appendChild(h4);
    var div3 = document.createElement('div');
    div3.classList.add('viewCallout', 'clearfix');
    var a = document.createElement('a');
    a.href = base_url + "/admin/company/" + json[i].company_id;
    a.className = "greenButton";
    a.appendChild(document.createTextNode('View'));
    div3.appendChild(a);
    div.appendChild(img);
    div.appendChild(div2);
    div.appendChild(div3);
    centerBox.appendChild(div);

  }

  sort.addEventListener('change', ajaxCall, false);
  search.addEventListener('input', ajaxCall, false);


})();
