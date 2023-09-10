<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php');?>
<body>
    <!-- Navigation -->
    <?php include('includes/navigation.php');?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <?php 
            $apiResponse = file_get_contents('http://localhost/CMS_PHP/API/api/read.php');
            $blogPosts = json_decode($apiResponse, true);

            if (!is_array($blogPosts)) {
                die("Failed to fetch or decode blog posts.");
            }
            ?>   
            <div class="col-md-8">
                <h1 class="page-header">
                    Blog Posts
                </h1>
                    <!-- Blog Post -->
                    <?php foreach($blogPosts['data'] as $post): ?>
                    <div>
                        <h2>
                        <a href="#"><?= htmlspecialchars($post['title']) ?></a>
                        </h2>
                        <p class="lead">
                        by <a href="index.php"><?= htmlspecialchars($post['author']) ?></a>
                        </p>
                        <p>Category: <?= htmlspecialchars($post['category_name']) ?></p>
                        <hr>
                        <p><?= htmlspecialchars($post['body']) ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                     </div>
                     <?php endforeach; ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <?php include('includes/footer.php');?>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
