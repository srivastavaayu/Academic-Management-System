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
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <h2 class="text-center">Notifications</h2>
                <div class="container-fluid">
                    <div class="row">
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