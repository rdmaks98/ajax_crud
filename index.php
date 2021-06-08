<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-uppercase text-primary my-2">
            AJAX crud OPERATION PHP
        </h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add Records
            </button>
        </div>
        <h2 class="text-warning">All Records</h2>
        <div id="record_contant"></div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Your Data Here</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <form id="add-user">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">FirstName:-</label>
                                <input type="text" name="fname" class="form-control"
                                    placeholder="Enter your First Name Here" />
                            </div>
                            <div class="form-group">
                                <label for="">Degree:-</label>
                                <input type="text" name="degree" class="form-control"
                                    placeholder="Enter your last Name Here" />
                            </div>
                            <div class="form-group">
                                <label for="">Email ID:-</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter your Email Here" />
                            </div>
                            <div class="form-group">
                                <label for="">Mobile Number:-</label>
                                <input type="text" name="mob" id="mob" class="form-control"
                                    placeholder="Enter your mobile number here" />
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addUser()">
                                Save
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- edit -->
    </div>

    <script>
    $(document).ready(function() {
        readUser();
    })

    function readUser() {
        var read = "read";
        $.ajax({
            url: "crud.php",
            type: "GET",
            data: {
                read: read,
            },
            success: function(data) {
                $("#record_contant").html(data);
            },
        });
    };

    // adduser

    function addUser() {
        var data = $("#add-user").serialize();
        $.ajax({
            data: data,
            type: "post",
            url: "crud.php",
            success: function(data) {
                readUser();
            }
        });
    }


    // deleteuser

    function DeleteUser(deleteid) {
        var conf = confirm("Are you sure you want to delete this user");
        if (conf == true) {
            $.ajax({
                url: "crud.php",
                type: 'post',
                data: {
                    deleteid: deleteid
                },
                success: function(data) {
                    readUser();
                }
            })
        }
    }

    // updateuser
    $("#update").click(function() {
        alert(12345);
        // var id = $("#id").val();
        // var fname = $("#fname").val();
        // var degree = $("#degree").val();
        // var email = $("#email").val();
        // var mob = $("#mob").val();
        // alert(id);
        // alert(fname);
        // $.ajax({
        //     url: 'edit.php',
        //     method: 'POST',
        //     // data: {
        //     //     name: name,
        //     //     ctgr: ctgr
        //     // },
        //     success: function(response) {
        //         alert(response);
        //     }
        // });
    });
    </script>
</body>

</html>