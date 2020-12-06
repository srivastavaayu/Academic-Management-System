<?php
    include "../connection.php";
    session_start();
    if(!isset($_SESSION["userName"])){
?>
        <script type="text/javascript">
            window.location="../index.php";
        </script>
<?php
    }
    else {
        if($_SESSION['userType']=="Student") {
?>
            <script type="text/javascript">
                alert("You do not have permission to access this section. Redirecting to Student Dashboard...");
                window.location="../student/dashboard.php";
            </script>
<?php
        }
    }
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <h2 class="text-center">Notifications</h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                        <hr>
                        <button class="btn btn-primary rounded-pill" type="button" data-toggle="modal" data-target="#modal-createnewnotif">Create New Notification</button>
                        <br><br>
                            <div id="modal-createnewnotif" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create New Notification</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form action="" name="form1" method="POST">
                                                <div>
                                                    <div class="form-check">
                                                        <label for="input-target2" class="form-check-label">Student</label>
                                                        <input id="input-target2" class="form-check-input" value="student" type="checkbox" name="target">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-notiftitle">Notification Title</label>
                                                    <input id="input-notiftitle" class="form-control" type="text" name="notiftitle" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-notifdesc">Notification Description</label>
                                                    <input id="input-notifdesc" class="form-control" type="text" name="notifdesc" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                    <button type="submit" name="submit-notif" class="btn btn-success"><i class="fas fa-plus"></i> Create New Notification</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <?php
                            $sql="SELECT * FROM admin_login WHERE admin=0 ORDER BY id ASC";
                            $result=$mysqli->query($sql);
                            $row_count=mysqli_num_rows($result);
                            if($row_count==0) {
                        ?>
                            <h4>No results to display!</h4>
                        <?php
                            }
                            else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-start">#</th>
                                        <th>Notified</th>
                                        <th>Notification Title</th>
                                        <th>Notification Description</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                                ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row[1];?></td>
                                        <td></td>
                                        <td></td>
                                        <td><a type="button" class="btn btn-outline-danger" href="delete_user.php?id=<?php echo $row[0];?>&user=0">Delete</a></td>
                                    </tr>
                                <?php
                                        $count=$count+1;
                                    }
                                ?>
                                </tbody>
                        <?php
                            }
                        ?>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>