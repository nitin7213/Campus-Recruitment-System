<style>
nav#sidebar {
    height: calc(100%);
    position: fixed;
    z-index: 99;
    left: 0;
    width: 250px;
    background: white;
    background-repeat: no-repeat;
    background-size: cover;
}

a.nav-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    border: none;
    background-color: #000000c4;
    color: #989898;
    font-weight: 600;

}

a.nav-item:hover,
.nav-item.active {
    background-color: #343a40;
    color: #fffafa;
}

#sidebar {
    width: 250px;
    /* Set the initial width */
    transition: all 0.3s ease;
}

#sidebar.collapsed {
    width: 60px;
    /* Set the collapsed width */
}

#sidebar.collapsed .nav-item-text {
    display: none;
    /* Hide the text by default */
}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark mt-2'>

    <div class="sidebar-list">

        <br>
        <span class='icon-field' onclick="toggleSidebar()">
            <i class="fa fa-bars float-right text-white mr-3" style="cursor: pointer"></i>
        </span>

        <br>
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i
                    class="fa fa-home"></i></span> <span class="nav-item-text"> Home</span></a>
        <a href="index.php?page=applications" class="nav-item nav-applications"><span class='icon-field'><i
                    class="fa fa-user-tie"></i></span><span class="nav-item-text"> Applications</span></a>
        <a href="index.php?page=vacancy" class="nav-item nav-vacancy"><span class='icon-field'><i
                    class="fa fa-list-alt"></i></span><span class="nav-item-text"> Vacancy</span></a>
        <?php if($_SESSION['login_type'] == 1): ?>
        <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i
                    class="fa fa-users"></i></span><span class="nav-item-text"> Users</span></a>
        <a href="index.php?page=recruitment_status" class="nav-item nav-recruitment_status"><span class='icon-field'><i
                    class="fa fa-th-list"></i></span><span class="nav-item-text"> Status Category</span></a>
        <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i
                    class="fa fa-cogs"></i></span><span class="nav-item-text"> Settings</span></a>

        <?php endif; ?>
    </div>

</nav>
<script>
$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
}
</script>