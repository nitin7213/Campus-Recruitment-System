<?php include 'db_connect.php' ?>
<style>

</style>

<div class="containe-fluid m-5">

    <div class="row">
        <div class="col-lg-10">

        </div>
    </div>

    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1> <?php echo "Welcome back ". $_SESSION['login_name']."!"  ?></h1>

                </div>
                <hr>

                <div class="row ml-2 mr-2">
                    <div class="col-md-3 offset-md-3">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="index.php?page=applications" style="text-decoration: none;color:white;">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">New Applicants</div>
                                            <div class="text-lg font-weight-bold">
                                                <?php 
                                        	$applicant = $conn->query("SELECT * FROM application where process_id = 0 ");
                                        	echo $applicant->num_rows;
                                        	 ?>

                                            </div>
                                        </div>

                                    </a> <i class="fa fa-user-tie"></i>
                                </div>

                            </div>

                        </div>
                    </div>
                    </a>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="index.php?page=vacancy" style="text-decoration: none;color:white;">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Active Vacanies</div>
                                            <div class="text-lg font-weight-bold">
                                                <?php 
                                            $vacancies = $conn->query("SELECT * FROM vacancy where status = 1  ");
                                            echo $vacancies->num_rows;
                                             ?>

                                            </div>
                                        </div>
                                    </a> <i class="fa fa-search"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>

    </script>