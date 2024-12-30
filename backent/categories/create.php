<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
       <!-- Bootstrap CSS -->
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 
include ('./backent/layouts/header.php')
?>
    
    <div class="col-md-8  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">CATEGORY TABLE</h4>
                <p class="card-description">
                    Enter your categories
                </p>
                <form class="forms-sample" action="categories/router.php" method="post">
                    <div class="form-group">
                        <label for="txtname">Name</label>
                        <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Name" required>
                    </div>
                      
                    <div class="form-group">
                        <label for="txtdes">Description</label>
                        <textarea class="form-control" name="txtdes" id="txtdes" placeholder="Description" required></textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>

            <footer class="footer" style="margin-bottom: 20px;">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
            </div>
        </footer> 

        </div>
        
    </div>

      <!-- Bootstrap JS and dependencies -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
