<?php 

?>

<div class="container-fluid m-5">

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>
                                <large><b>User List</b></large>
                            </span>
                            <button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i>
                                New user</button>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="card col-lg-12">
                            <div class="card-body">
                                <table class="table-striped table-bordered col-md-12">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM users order by name asc");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $i++ ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $row['name'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $row['username'] ?>
                                            </td>
                                            <td class="text-center p-2">
                                                <center>

                                                    <a class="btn btn-sm btn-primary edit_user"
                                                        href="javascript:void(0)"
                                                        data-id='<?php echo $row['id'] ?>'>Edit</a>

                                                    <a class="btn btn-sm btn-danger delete_user"
                                                        href="javascript:void(0)"
                                                        data-id='<?php echo $row['id'] ?>'>Delete</a>


                                                </center>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $('#new_user').click(function() {
            uni_modal('New User', 'manage_user.php')
        })
        $('.edit_user').click(function() {
            uni_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'))
        })
        $('.delete_user').click(function() {
            _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
        })

        function delete_user($id) {
            start_load()
            $.ajax({
                url: 'ajax.php?action=delete_user',
                method: 'POST',
                data: {
                    id: $id
                },
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Data successfully deleted", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 1500)

                    }
                }
            })
        }
        </script>