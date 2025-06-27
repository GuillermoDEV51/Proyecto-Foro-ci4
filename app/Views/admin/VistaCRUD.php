<!--$this->include('layouts/header.php'); -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>boostra/js/bootstrap.bundle.min.js"></script>
  <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Barra de navegación -->
  <nav>
    <div class="nav-container">
      <a href="<?php echo base_url() ?>user/indexusuario">Inicio</a>
      <a href="<?php echo base_url() ?>user/proyectosusuario">Proyectos</a>
      <a href="<?php echo base_url() ?>user/ayudausuario">Ayuda</a>
      <a href="<?php echo base_url() ?>user/contactousuario">Contacto</a>
      
      
    </div>
 </nav>

    <!-- Page Wrapper -->
    <div id="wrapper">

<!--$this->include('layouts/navsidebar.php'); -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
                        

                    <!-- Content Row -->
                    <div class="row">

                        


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
 <!--<div class="card">
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
                    <th>codigo</th>
                    <th>nombre</th>
                    <th>rol</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php

                //if($ses_data)
                //{
                    //foreach($ses_data as $user)
                    //{
                       // echo '
                       // <tr>
                           // <td>'.$user["codigo"].'</td>
                           // <td>'.$user["nombre"].'</td>
                           // <td>'.$user["rol"].'</td>
                           // <td><a href="'.base_url().'/crud/fetch_single_data/'.$user["id"].'" class="btn btn-sm btn-warning">Edit</a></td>
                            //<td><button type="button" onclick="delete_data('.$user["id"].')" class="btn btn-danger btn-sm">Delete</button></td>
                       // </tr>';
                   // }
               // }

                ?>
            </table>
        </div>
        <div>
            <?php

            //if($pagination_link)
            //{
              //  $pagination_link->setPath('crud');

               // echo $pagination_link->links();
            //}
            
            ?>

        </div>
    </div>
</div> -->






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
            
            <!--$this->include('layouts/footer.php');-->
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