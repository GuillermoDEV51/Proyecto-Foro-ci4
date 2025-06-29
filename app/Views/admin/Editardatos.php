<?= $this->include('layouts/header.php'); ?>

<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">

<?= $this->include('layouts/navsidebar.php'); ?>

<div class="container">
        
        <?php 

        $validation = \Config\Services::validation();


        ?>
       
        
        <div class="card">
            <div class="card-header">Editar datos</div>
            <div class="card-body">

            <!-- Formulario de de editar datos -->
                <form method="post" action="<?php echo base_url('crud/edit_validation'); ?>">

                    <!-- Añadir nombre de user -->
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user_data['nombre']; ?>">

                        <!-- Error -->
                        <?php 
                        if($validation->getError('nombre'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('nombre')."
                            </div>
                            ";
                        }
                        
                        ?>
                    </div>

                        <!-- Añadir Codigo de user -->
                    <div class="form-group">
                        <label>codigo</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user_data['codigo']; ?>">


                        <!-- Error -->
                        <?php 
                        if($validation->getError('codigo'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('codigo')."
                            </div>
                            ";
                        }
                        ?>
                    </div>


                        <!-- Añadir contraseña de user -->
                    <div class="form-group">
                        <label>contraseña</label>
                        <input type="text" name="contraseña" class="form-control" value="<?php echo $user_data['contraseña']; ?>">

                        <!-- Error -->
                        <?php 
                        if($validation->getError('contraseña'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('contraseña')."
                            </div>
                            ";
                        }
                        ?>
                    </div>


                        <!-- Asignar rol de user -->
                    <div class="form-group">
                        <label>rol</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Estudiante" <?php if($user_data['Estudiante'] == 'Estudiante') echo 'selected'; ?>>Estudiante</option>
                            <option value="Admin" <?php if($user_data['Admin'] == 'Admin') echo 'selected'; ?>>administrador</option>
                        </select>

                        <!-- Error -->
                        <?php 
                        if($validation->getError('rol'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('rol')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $user_data["id"]; ?>" />
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>





</div>
</body>
<?= $this->include('layouts/footer.php'); ?>
</html>