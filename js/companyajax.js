(function(){
  //AJAX FUNCTIONALITY FOR THE CMS COMPANIES PAGE
    var boxes = document.querySelectorAll('.companii'),
        select = document.querySelector('#sort'),
        search = document.querySelector('#search'),
        limit = document.querySelector('#limit'),
        centerBox = document.querySelector('#row1'),
        httpRequest;


    function ajaxCall() {
        httpRequest = new XMLHttpRequest();
        if(httpRequest===null){
            alert("Error! Please update your browser.");
            return;
        }

        var url = base_url+"/admin/ajaxCompanies?value=" + select.value + "&search="+search.value+"&limit="+limit.value;

        httpRequest.onreadystatechange = updatePage;
        httpRequest.open("post", url, true);
        httpRequest.send();
    }

    function updatePage() {
        if(httpRequest.readyState=== 4 || httpRequest.readyState=== "complete") {
            if (httpRequest.responseText==='false'){
                centerBox.innerHTML = "";
                return;
            } else {
                var json = JSON.parse(httpRequest.responseText);
                centerBox.innerHTML = ""; //DELETE THE CURRENT BOXES.

                for (var i = 0; i < json.length; i++) {
                    buildBoxes(json, i);
                }
            }
        }
    }

    function buildBoxes(json, i) { //FUNCTION THAT RENDERS OUT THE HTML FOR THE BOXES
        var div = document.createElement('div'),
            img = document.createElement('img'),
            div2 = document.createElement('div'),
            h3 = document.createElement('h3'),
            h4 = document.createElement('h4'),
            div3 = document.createElement('div'),
            a = document.createElement('a');

        div.classList.add('companii', 'clearfix');
        img.src = img_url+"img/default_dude_img.png";
        img.alt = "Profile Picture";
        div2.className = "title";
        h3.appendChild(document.createTextNode(json[i].company_name));
        h4.appendChild(document.createTextNode(json[i].company_contactName));
        div2.appendChild(h3);
        div2.appendChild(h4);
        div3.classList.add('viewCallout', 'clearfix');
        a.href = base_url + "/admin/company/" + json[i].company_id;
        a.className = "greenButton";
        a.appendChild(document.createTextNode('View'));
        div3.appendChild(a);
        div.appendChild(img);
        div.appendChild(div2);
        div.appendChild(div3);

        centerBox.appendChild(div);
    }

    select.addEventListener('change', ajaxCall, false);
    search.addEventListener('input', ajaxCall, false);
    limit.addEventListener('change', ajaxCall, false);
})();
