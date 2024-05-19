<aside class="main-sidebar-right" style="background-color: #0e1f23; position: fixed; right: 0; top: 0; height: 100%;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="background-color: #0e1f23">
        <!-- Sidebar user panel -->

        <br>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree"
            style="background-color: #0e1f23 ; color:white ; font-size: 15px; font-family:Times">
            <br> <br>
            <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class=""><a href="votes.php"><span class="glyphicon glyphicon-lock"></span> <span>Votes</span></a></li>
            <li class="header" style="background-color: #28272D ;color:white ; font-size: 12px; font-family:Times">
                MANAGE</li>
            <li class=""><a href="voters.php"><i class="fa fa-users"></i> <span>Voters</span></a></li>
            <li class=""><a href="positions.php"><i class="fa fa-tasks"></i> <span>Positions</span></a></li>
            <li class=""><a href="candidates.php"><i class="fa fa-black-tie"></i> <span>Candidates</span></a></li>
            <li class="header" style="background-color:#28272D ;color:white ; font-size: 12px; font-family:Times">
                SETTINGS</li>
            <li class=""><a href="ballot.php"><i class="fa fa-file-text"></i> <span>Ballot Position</span></a></li>
            <li class=""><a href="#config" data-toggle="modal"><i class="fa fa-cogs"></i> <span>Election
                        Title</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php include 'config_modal.php'; ?>

<style>
body {
    margin-right: 250px;
}

.main-sidebar-right {
    width: 250px;
}
</style>