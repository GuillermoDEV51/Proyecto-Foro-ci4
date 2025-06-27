
<?= $this->include('layouts/header.php'); ?>

<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">

<?= $this->include('layouts/navsidebar.php'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="<?= base_url('/pdf') ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    
                    
                    
                            </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->












                    <div class="row">


                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                               


<!-- table data started-->

<!-- table data started-->


 


<?php

$session = \Config\Services::session();

if($session->getFlashdata('success'))
{
    echo '
    <div class="alert alert-success">'.$session->getFlashdata("success").'</div>
    ';
}

?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">User Data</div>
            <div class="col text-right">
                <a href="<?php echo base_url("/crud/add")?>" class="btn btn-success btn-sm">Create</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive display" id="myTable" >
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php

                if($user_data)
                {
                    foreach($user_data as $user)
                    {
                        echo '
                        <tr>
                            <td>'.$user["id"].'</td>
                            <td>'.$user["name"].'</td>
                            <td>'.$user["email"].'</td>
                            <td>'.$user["gender"].'</td>
                            <td><a href="'.base_url().'/crud/fetch_single_data/'.$user["id"].'" class="btn btn-sm btn-warning">Edit</a></td>
                            <td><button type="button" onclick="delete_data('.$user["id"].')" class="btn btn-danger btn-sm">Delete</button></td>
                        </tr>';
                    }
                }

                ?>
            </table>
        </div>
        <div>
            <?php

            if($pagination_link)
            {
                $pagination_link->setPath('crud');

                echo $pagination_link->links();
            }
            
            ?>

        </div>
    </div>
</div>





                    <!-- table -->






                    <!-- table -->







                        <!-- Pie Chart -->
                        
                             
                            </div>
                        </div>
                    </div>

                   
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <?= $this->include('layouts/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

 
</body>

<script>
function delete_data(id)
{
    if(confirm("Are you sure you want to remove it?"))
    {
        window.location.href="<?php echo base_url(); ?>/crud/delete/"+id;
    }
    return false;
}


</script>


</html>