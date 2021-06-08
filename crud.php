<?php

 $conn = mysqli_connect("localhost","root","","ajax_crud");
    if(empty($conn))
    {
        die("Error". mysqli_connect_error()); 
    }

    
    // Insert data
    extract($_POST);
    // insert data into database
    if(isset($_POST['fname']) && isset($_POST['degree']) && isset($_POST['email']) && isset($_POST['mob'])) {
        $query = "INSERT INTO `ajax-user`(`fname`, `degree`, `email`, `mob`) VALUES ('$fname','$degree','$email','$mob')";
        mysqli_query($conn, $query);
    }
    
    // display record 
    if (isset($_GET['read'])) {
    $data = '<table class="table table-bordered table-striped">
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>';

    $query = "SELECT * from `ajax-user` ";
   
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $number = 1;
        while ($row = mysqli_fetch_array($result)) {
            $data .= ' <tr>
                        <td>' . $number++ . '</td>
                        <td>' . $row['fname'] . '</td>
                        <td>' . $row['degree'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['mob'] . '</td>
                        <td>
                        <button data-toggle="modal" data-target="#empModel'.$row['id'] .'" class="btn btn-warning">Edit</button>
                            <div class="modal fade" id="empModel'.$row['id']. '">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                &times;
                                            </button>
                                        </div>
                                        <form>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="'.$row['id'] .'">
                                                    <label for="">FirstName:-</label>
                                                    <input type="text" id="fname" name="fname" class="form-control"
                                                        value="'.$row['fname']. '" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Degree:-</label>
                                                    <input type="text" id="degree" name="degree" class="form-control"
                                                        value="'.$row['degree']. '" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email ID:-</label>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="'.$row['email']. '" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Mobile Number:-</label>
                                                    <input type="text" name="mob" id="mob" class="form-control"
                                                    value="'.$row['mob']. '" />
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" id="update" class="btn btn-success" data-dismiss="modal">
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
                        </td>
                        <td>
                        <button onclick="DeleteUser(' . $row['id'] . ')" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>';
        }
    }
    $data .= '</table>';
    echo $data;
}


if (isset($_POST['deleteid'])) {
    $id = $_POST['deleteid'];
    $query = "DELETE FROM `ajax-user` where id = '$id'";
    mysqli_query($conn, $query);
}
?>