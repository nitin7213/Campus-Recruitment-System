<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">


        </div>
    </div>
</header>
<section id="">
    <br>

    <?php include 'admin/db_connect.php' ?>

    <?php
	$qry = $conn->query("SELECT * FROM vacancy where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
?>
    <div class="container pt-4 ">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center"><b><?php echo $position ?></b></h4>
                        <hr class="divider" style="max-width: calc(10%)">
                        <p class="text-left">
                            <small>
                                <h2>Needed Applicants: <larger><?php echo $availability ?></larger>
                                </h2>
                            </small>
                        <p class="text-right">
                            <?php if($status == 1): ?>
                            <span class="badge badge-success p-2">Currently Hiring</span>
                            <?php else: ?>
                            <span class="badge badge-danger p-2">Hiring Closed</span>
                            <?php endif; ?>
                        </p>
                        </p>
                    </div>
                </div>
                <hr class="divider" style="max-width: calc(100%)">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo html_entity_decode($description) ?>
                    </div>
                </div>
                <hr class="divider" style="max-width: calc(100%)">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($status == 1): ?>
                        <div class="col text-center">
                            <button class="btn btn-info float-centre" type="button" id="apply_now">Apply Now</button>
                        </div>
                        <?php else: ?>
                        <div class="col text-center">
                            <button class="btn btn-danger col-md-4" type="button" disabled="" id="">Application
                                Closed</button>
                        </div>
                        <?php endif; ?>
                        <div class="col text-center">
                            <button class="btn btn-secondary  m-3" onclick="location.href='index.php'" type="button" id="back"> <span class="fa fa-arrow-left"></span> Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
</section>
<script>
$('html, body').animate({
    scrollTop: ($('section').offset().top - 72)
}, 1000);
$('#apply_now').click(function() {
    uni_modal('Application from', 'submit_application.php?id=<?php echo $_GET['id'] ?>', 'large')
})
</script>