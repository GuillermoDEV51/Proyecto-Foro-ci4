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
            <div class="card-header">Edit Data</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('crud/edit_validation'); ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user_data['name']; ?>">

                        <!-- Error -->
                        <?php 
                        if($validation->getError('name'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('name')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user_data['email']; ?>">

                        <?php 
                        if($validation->getError('email'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('email')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" <?php if($user_data['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if($user_data['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>

                        <?php 
                        if($validation->getError('gender'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('gender')."
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