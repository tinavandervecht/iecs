(function(){
    //AJAX CMS FUNCTIONALITY
    var boxes = document.querySelectorAll('.estiimat'),
        rows = document.querySelectorAll('.new'),
        select = document.querySelector('#sort'),
        search = document.querySelector('#search'),
        limit = document.querySelector('#limit'),
        centerBox = document.querySelector('#centerIt'),
        table = document.querySelector('tbody'),
        httpRequest;

    function ajaxCall() {
        httpRequest = new XMLHttpRequest();
        if(httpRequest===null){
            alert("Whoa there! Your browser is not updated enough to use this site. Maybe it's time for and <a href='http://browsehappy.com'>upgrade</a>?");
            return;
        }

        var url = base_url+"/admin/ajaxEstimates?value=" + select.value + "&search="+search.value+"&limit="+limit.value;

        httpRequest.onreadystatechange = updatePage;
        httpRequest.open("get", url);
        httpRequest.send();
    }

    function updatePage() {
        if(httpRequest.readyState===4 || httpRequest.readyState==="complete") {
            if (httpRequest.responseText==='false') {
                centerBox.innerHTML = "";
                if (table) {
                    table.innerHTML = "";
                }
                return;
            } else {
                var json = JSON.parse(httpRequest.responseText);

                //DELETE WHATS CURRENTLY IN THE BOXES AND TABLES
                centerBox.innerHTML = "";
                table.innerHTML = "";

                if (json.length < 4) { //IF THERE ARE LESS THEN 5 ENTRIES YOU DON'T NEED TO RENDER THE TABLE.
                    for (var i = 0; i < json.length; i++) {
                        buildBoxes(json, i);
                    }
                } else {
                    for (var i = 0; i < 4; i++) {
                        buildBoxes(json, i);
                    }

                    for (var i = 4; i < json.length; i++) {
                        buildTables(json, i);
                    }
                }
            }
        }
    }

    function buildBoxes(json, i) { //FUNCTION FOR RENDERING OUT THE HTML FOR THE NEW BOXES
        var div = document.createElement('div'),
            div2 = document.createElement('div'),
            titleH3 = document.createElement('h3'),
            titleH4 = document.createElement('h4'),
            p1 = document.createElement('p'),
            p2 = document.createElement('p'),
            p3 = document.createElement('p'),
            span1 = document.createElement('span'),
            span2 = document.createElement('span'),
            span3 = document.createElement('span'),
            p4 = document.createElement('p'),
            a = document.createElement('a');

        div.classList.add("estiimat", "clearfix");
        div2.className = "title";
        titleH3.appendChild(document.createTextNode(json[i].company_name));
        titleH4.appendChild(document.createTextNode(json[i].estimate_name));
        div2.appendChild(titleH3);
        div2.appendChild(titleH4);
        span1.className = "edit";
        span1.appendChild(document.createTextNode('Date Edited: '+json[i].estimate_modifiedDate.substring(0, 10)));
        p1.appendChild(span1);
        span2.classList.add("block", "est");
        span2.appendChild(document.createTextNode('Recommended Block: CC35'));
        p2.appendChild(span2);
        span3.className = "factor";
        span3.appendChild(document.createTextNode('Safety Factor: 2.3'));
        p3.appendChild(span3);
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

    function buildTables(json, i) { //FUNCTION FOR RENDERING OUT TABLE ENTRIES.
        var tr = document.createElement('tr'),
            td1 = document.createElement('td'),
            td2 = document.createElement('td'),
            td3 = document.createElement('td'),
            td4 = document.createElement('td'),
            td5 = document.createElement('td'),
            td6 = document.createElement('td'),
            td7 = document.createElement('td'),
            a = document.createElement('a');

        tr.className = "new";
        td1.appendChild(document.createTextNode(""));
        td2.appendChild(document.createTextNode(json[i].company_name));
        td3.appendChild(document.createTextNode(json[i].estimate_name));
        td4.appendChild(document.createTextNode(json[i].estimate_modifiedDate.substring(0, 10)));
        td5.appendChild(document.createTextNode("BLOCK SIZE"));
        td6.appendChild(document.createTextNode("Factoids"));
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
    limit.addEventListener('change', ajaxCall, false);
})();
