function show(a) {
    var div = document.getElementById(a);
    console.log(div);
    if (div.style.display == "none") {
        div.style.display = "block";
    }
    else {
        div.style.display = "none";
    }
}
// function shows(a) {
//     var div = document.getElementById(a);
//     if (div.style.display == "none") {
//         div.style.display = "block";
//     }
//     else {
//         div.style.display = "none";
//     }
// }

var fly = document.getElementById('flyy');
var use = document.getElementById('usee');
var suc = document.getElementById('success');

function flyy() {
    // selected=document.getElementsByClassName("selecte");
    // selected
    fly.style.display = "block";
    use.style.display = "none";
    suc.style.display = "none";

    selected = document.getElementById("t1");
    notselected1 = document.getElementById("t2");
    notselected2 = document.getElementById("t3");
    selected.style.backgroundColor = "#e5011a";

    notselected1.style.backgroundColor = "#FF914D";
    notselected2.style.backgroundColor = "#FF914D";
}

function usee() {
    // selected=document.getElementsByClassName("selecte");
    // selected
    fly.style.display = "none";
    use.style.display = "block";
    suc.style.display = "none";


    selected = document.getElementById("t2");
    notselected1 = document.getElementById("t1");
    notselected2 = document.getElementById("t3");
    selected.style.backgroundColor = "#e5011a";

    notselected1.style.backgroundColor = "#FF914D";
    notselected2.style.backgroundColor = "#FF914D";

}


function success() {
    fly.style.display = "none";
    use.style.display = "none";
    suc.style.display = "block";


    selected = document.getElementById("t3");
    notselected1 = document.getElementById("t1");
    notselected2 = document.getElementById("t2");
    selected.style.backgroundColor = "#e5011a";

    notselected1.style.backgroundColor = "#FF914D";
    notselected2.style.backgroundColor = "#FF914D";
}

$(document).ready(function () {
    $.ajax({
        url: 'http://localhost/api/user_api.php?loged_in',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                window.location.replace('login.php')

                let result = JSON.parse(data).data;
                console.log(result);
                // html = '<img src="./public/img/ic_logo_main.png" alt="" style="width: 100%;"> <h4>KHQ FOOD</h4>'
                // $('#profile').html()
            } else {
            }
        }

    })
})
