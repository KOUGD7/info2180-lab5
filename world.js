$( document ).ready(function() {

    var httpRequest = new XMLHttpRequest();
    var url = "http://localhost/info2180-lab5/world.php?country=";
    var result = document.querySelector("#result");
  

    let btn = $("#lookup_country");
    let btncity = $("#lookup_city");
    

    btn.on('click', function() {
        let country = $('#country').val();

        httpRequest.onreadystatechange = countrysearch;
        httpRequest.open('GET', url + country+'&context=None');
        httpRequest.send();
        });


    function countrysearch() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                //$("#result").append(response);
                result.innerHTML = response;
                //alert(response);
                      
            } 
            else {
                console.log(httpRequest.status)
                alert('There was a problem with the request.');
             }
        }
    }

    btncity.on('click', function() {
        let country = $('#country').val();
    
        httpRequest.onreadystatechange = citysearch;
        httpRequest.open('GET', url + country+'&context=cities');
        httpRequest.send();
            
        });

    function citysearch() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                //$("#result").append(response);
                result.innerHTML = response;
                //alert(response);
                      
            } 
            else {
                console.log(httpRequest.status)
                alert('There was a problem with the request.');
             }
        }
    }

});
