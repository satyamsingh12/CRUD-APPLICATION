<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Application-View users</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
<div class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">CRUD APPLICATION</a>
    </div>
</div>
<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
            <?php
            $success = $this->session->userdata('success');
            if($success != ""){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><?php echo $success?>
            
            </div>
            <?php
             }
            ?>
           
    </div>
    <div class="container">
             <div class="row">
             <div class="col-6"><h3>View Users</h3></div>
    <div class="col-6">
        <a href="<?php echo base_url().'index.php/user/create'?>" class="btn btn-primary">Create</a>
    </div>
             </div>
    </div>
    
    
    <hr>

    <div class="col-md-12">

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php if(!empty($users)) { foreach($users as $user) {?>
            <tr>
                <td><?php echo $user['users_id']?></td>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['email']?></td>
                <td>
                    <a href="<?php echo base_url(). 'index.php/user/edit/'.$user['users_id']?>" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="<?php echo base_url(). 'index.php/user/delete/'.$user['users_id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } }else { ?>
                <tr>
                    <td colspan="5">Records not found</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

    
</body>
</html>