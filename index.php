<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="./public/css/admin.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://css.gg/css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


</head>


<body>

    <header>
        <div class="header-content">
            <div class="logo">
                <img src="./public/img/ic_logo_main.png" alt="">
            </div>

            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="las la-search"></i></label>
            </div>

            <div class="header-menu">

                <div class="notify-icon">
                    <span class="las la-envelope"></span>
                    <span class="notify">4</span>
                </div>

                <div class="notify-icon">
                    <span class="las la-bell"></span>
                    <span class="notify">3</span>
                </div>

                <div class="user" id="user">
                    <span class="las la-power-off"></span>
                    <span id="logout_admin">Logout</span>
                </div>
            </div>
        </div>

    </header>


    <section>
        <div class="container">
            <div class="sidebar">

                <div class="side-content">
                    <div class="profile" id="profile">
                        <img src="./public/img/ic_logo_main.png" alt="" style="width: 100%;">
                        <h4>KHQ FOOD</h4>
                    </div>

                    <div class="side-menu">
                        <ul>
                            <li class="select" onclick="flyy()" id="t1">

                                <span><i class="fa-solid fa-bell"></i></span>
                                <small>Orders</small>

                            </li>

                            <li onclick="success()" class="" id="t3">

                                <span>
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                                <small>Success Bills</small>

                            </li>

                            <li onclick="usee()" class="" id="t2">

                                <span>
                                    <i class="fa-solid fa-utensils"></i>
                                </span>
                                <small>Menu</small>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="page-content" id="flyy">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <!-- Load Dish in shop  -->
                            <i class="fa-solid fa-cart-shopping" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-progress">
                            <small>New Orders</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="records table-responsive">

                    <div class="record-header">


                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>
                    </div>

                    <!-- Div to add flightsssssssssssssssssssss -->

                    <br>
                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span></span><i class="fa-solid fa-user"></i> &nbsp; CUSTOMER </th>
                                    <th><span></span> <i class="fa-solid fa-phone"></i> &nbsp; PHONE</th>
                                    <th><span></span> <i class="fa-solid fa-location-dot"></i> &nbsp; ADDRESS</th>
                                    <th><span></span> <i class="fa-solid fa-coins"></i> &nbsp; PRICE</th>
                                    <th><span></span> VIEWS DETAIL </th>
                                    <th><span></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="new_order">
                                <!-- Table of dish -->
                            </tbody>
                        </table>
                    </div>




                </div>

            </div>

            <div class="page-content" id="success">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <!-- Load Dish in shop  -->
                            <i class="fa-solid fa-cart-shopping" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-progress">
                            <small>Orders</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-head">
                            <!-- Load bills of shop -->
                            <i class="fa-solid fa-dollar-sign" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-progress">
                            <small>Revenue</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="records table-responsive">

                    <div class="record-header">


                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>
                    </div>

                    <!-- Div to add flightsssssssssssssssssssss -->

                    <br>
                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span></span><i class="fa-solid fa-user"></i> &nbsp; CUSTOMER </th>
                                    <th><span></span> <i class="fa-solid fa-phone"></i> &nbsp; PHONE</th>
                                    <th><span></span> <i class="fa-solid fa-location-dot"></i> &nbsp; ADDRESS</th>
                                    <th><span></span> <i class="fa-solid fa-coins"></i> &nbsp; PRICE</th>
                                    <th><span></span> VIEWS DETAIL </th>
                                    <th><span></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="succes_order">
                                <!-- Table of dish -->

                            </tbody>
                        </table>
                    </div>




                </div>

            </div>

            <div class="page-content" id="usee">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">

                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>User</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <button onclick="show('toshow')" id="add_flight">Add record</button>
                        </div>
                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>

                    </div>

                    <div class="addformr" style="display: none;" id="toshow">
                        <form onsubmit="return false;" id="add_fight_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="dish_name" id="dish_name"
                                        placeholder="Dish's name">
                                </div>

                                <div class="col-md-6"
                                    style="display: flex; flex-direction: column; margin-bottom: 1em;">
                                    <input class="form-control" type="number" name="dish_price" id="dish_price"
                                        placeholder="Dish's price">
                                </div>
                            </div>

                            <textarea class="form-control" name="dish_notes" id="dish_notes"
                                placeholder="INGREDIENTS"></textarea>
                            <br>
                            <input class="orm-control-file" type="file" name="dish_img">
                            <br>
                            <br>
                            <select class="form-control" id="dish_type">
                                <option value=''>TYPE</option>
                                <option value='RICE'>RICE</option>
                                <option value='BREAD'>BREAD</option>
                                <option value='DRINK'>DRINK</option>
                                <option value='NODEL'>NODEL</option>
                            </select>
                            <br>
                            <input type="submit" name="" id="addNewDish" value="ADD"
                                style="background-color: #ff5757; padding: 0.4em 0.6em; border-radius: 0.4em; margin-top: 1em; width: 100%">


                        </form>
                    </div>

                    <br>
                    <div class="data">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span></span> NAME</th>
                                    <th><span></span> INGREDIENTS</th>
                                    <th><span></span> PRICE</th>
                                    <th><span></span> ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="dishes_table">
                                <tr>
                                    <td>1202</td>
                                    <td>Thit kho</td>
                                    <td>Thit kho lam tu thit</td>
                                    <td>20000</td>
                                    <td>DELETE</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>


        <div class="modal fade bd-example-modal-lg" id="modal_detail" tabindex="-1" role="dialog"
            aria-labelledby="detailLabel" aria-hidden="flase">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailLabel">User's booking history</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 id="customer_infor">Pham Hoang Kha</h6>
                        <h6 id="state">Pham Hoang Kha</h6>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Dish</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Sum</th>
                                </tr>
                            </thead>
                            <tbody id="table_history">

                            </tbody>
                        </table>
                        <div style='display: flex; justify-content: space-between;'>
                            <h4>Toal:</h4>
                            <h4 id='total'>50000</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_new_price">Save changes</button>
                    </div>
                </div>
                s
            </div>
        </div>
    </section>

    <!-- <script src="./public/js/admin.js"></script> -->

</body>

<script>
let base64String = "";

// $('#detail').modal('show')

function show(a) {
    var div = document.getElementById(a);
    console.log(div);
    if (div.style.display == "none") {
        div.style.display = "block";
    } else {
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

$(document).ready(() => {
    $.ajax({
            url: 'http://localhost/api/user_api.php?loged_in',
            method: 'GET',
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {

                    let result = JSON.parse(data).data;
                    console.log(result);
                    html =
                        '<img src="data:image/png;base64,' + result[0].logo +
                        '" style="width: 100%;"> <h4>' +
                        result[0].name + '</h4>'
                    $('#profile').html(html);
                } else {
                    window.location.replace('login.php')

                }
            }
        }),
        $.ajax({
            url: 'http://localhost/api/bill_api.php?new_bill',
            method: 'GET',
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {
                    newOrder = '';
                    let newbills = JSON.parse(data).data;
                    newbills.forEach(e => {
                        newOrder += '<tr>' +
                            '<td>' + e.bill_id + '</td>' +
                            '<td>' + e.name + '</td>' +
                            '<td>' + e.phone + '</td>' +
                            ' <td>' + e.addre + '</td>' +
                            '<td>' + e.total + '</td>' +
                            '<td class= "details" data-id = "' + e
                            .bill_id +
                            '"> DETAIL </td>' +
                            '<td><button class="btn btn-primary btn_done" dataid = "' + e
                            .bill_id +
                            '">DONE</button></td>' +
                            '</tr>';
                    })

                    $('#new_order').html(newOrder);

                    console.log(data);
                } else {
                    window.location.replace('login.php')

                }
            }
        })
});

$('#logout_admin').click(() => {
    $.ajax({
        url: 'http://localhost/api/user_api.php?log_out',
        method: 'GET',
        success: () => {
            window.location.reload();
        }
    })

})

$('#addNewDish').click(() => {
    console.log($('#dish_type').find(":selected").val());
    if ($('#dish_name').val() == "" || $('#dish_price').val() == "" || $('#dish_notes').val() == "" || $(
            '#dish_img').val() == "" || $('#dish_type').find(":selected").val() == "") {
        alert('Fill all information, please!')
    } else {
        if (imageUploaded() == "") {
            alert('Click again!')
        } else {
            let base64 = imageUploaded();
            console.log(base64);
            $.ajax({
                url: 'http://localhost/api/dish_api.php',
                method: 'POST',
                data: {
                    dish_name: $('#dish_name').val(),
                    dish_notes: $('#dish_notes').val(),
                    dish_price: $('#dish_price').val(),
                    dish_img: base64,
                    dish_type: $('#dish_type').find(":selected").val()
                },
                success: (data) => {
                    let status = JSON.parse(data).status;
                    if (status) {
                        alert('Add done!');
                        window.location.reload();
                    } else {
                        alert('Somthing wrong! Try again!');
                    }
                }
            })
        }
    }
})


function imageUploaded() {

    var file = document.querySelector(
        'input[type=file]')['files'][0];

    var reader = new FileReader();
    // console.log("next");

    reader.onload = function() {
        base64String = reader.result.replace("data:", "")
            .replace(/^.+,/, "");
        // console.log(base64String);
    }
    reader.readAsDataURL(file);
    return base64String;
}

$('#t2').click(() => {
    $.ajax({
        url: 'http://localhost/api/dish_api.php?dishes',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let dishes = JSON.parse(data).data;
                dish_table = ""
                dishes.forEach(element => {
                    dish_table += '<tr>' +
                        '<td>' + element.dish_id + '</td>' +
                        '<td>' + element.name + '</td>' +
                        '<td>' + element.ingredients + '</td>' +
                        '<td>' + element.price * 1000 + '</td>' +
                        '<td class="delete_dish" data-id = "' + element.dish_id +
                        '">DELETE</td>' +
                        '</tr>'
                });

                $('#dishes_table').html(dish_table);
            }
        }
    })
})

$(document).on('click', '.delete_dish', function() {
    let delete_id_dish = $(this).attr('data-id');
    // console.log(delete_id);

    $.ajax({
        url: 'http://localhost/api/dish_api.php',
        method: 'POST',
        data: {
            delete_id: delete_id_dish
        },
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                alert('Was delete dish ' + delete_id_dish);
                window.location.reload();
            }
        }
    })
})

$('#t3').click(() => {
    $.ajax({
        url: 'http://localhost/api/bill_api.php?done_bill',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                newOrder = '';
                let newbills = JSON.parse(data).data;
                newbills.forEach(e => {
                    newOrder += '<tr>' +
                        '<td>' + e.bill_id + '</td>' +
                        '<td>' + e.name + '</td>' +
                        '<td>' + e.phone + '</td>' +
                        ' <td>' + e.addre + '</td>' +
                        '<td>' + e.total + '</td>' +
                        '<td class= "details" data-id = "' + e
                        .bill_id +
                        '"> DETAIL </td>' +
                        '<td>NULL</td>' +
                        '</tr>';
                })

                $('#succes_order').html(newOrder);

                // console.log(data);
            } else {
                window.location.replace('login.php')

            }
        }
    })
})

$(document).on('click', '.btn_done', function() {
    let id = $(this).attr('dataid')
    console.log(id);
    $.ajax({
        url: 'http://localhost/api/bill_api.php',
        method: 'POST',
        data: {
            update_bill_id: id
        },
        success: (data) => {
            console.log(data);
            let status = JSON.parse(data).status;
            if (status) {
                alert('Bill ' + id + ' was updated!')
                // console.log(data);
            }
        }
    })
})

$(document).on('click', '.details', function() {
    let id = $(this).attr('data-id')
    console.log(id);
    $.ajax({
        url: 'http://localhost/api/bill_api.php',
        method: 'POST',
        data: {
            get_bill_id: id
        },
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let details = JSON.parse(data).data;
                console.log(details)

                $('#customer_infor').html(details[0].customer + ' - ' + details[0].phone + ' - ' +
                    details[0].address);
                $('#state').html(details[0].state);
                html = ''
                details.forEach(d => {
                    html += '<tr>' +
                        ' <td>' + d.dish + '</td>' +
                        ' <td>' + d.total + '</td>' +
                        ' <td>' + d.amount + '</td>' +
                        ' <td>' + d.price * d.amount + '</td>' +
                        '</tr>'
                })
                $('#table_history').html(html);
                $('#total').html(details[0].total);
                $('#modal_detail').modal('show');
            }
        }
    })
})
</script>

</html>