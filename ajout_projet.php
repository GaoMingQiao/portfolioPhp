<?php
require_once "inc/database.php";
// var_dump($_POST);
// var_dump($pdo);
// var_dump($_FILES);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if (empty($_POST['titre'])) {
        $errors['titre'] = "The titre should not be empty!";
    }
    if (strlen($_POST['titre']) < 2 || strlen($_POST['titre']) > 50) {
        $errors['titre'] = "The titre should have 2 to 50 caracters!";
    }
    if (empty($_POST['contenu'])) {
        $errors['contenu'] = "The contenu should not be empty!";
    }
    if (strlen($_POST['contenu']) <= 10) {
        $errors['contenu'] = "The contenu should be more than 10 caracters!";
    }
    if (!empty($_FILES['image'])) {
        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($extension, $allowed_extensions)) {
            $errors['image'] = "The format of image is not permitted!";
        }

        if ($_FILES['image']['size'] > 8000000) {
            $errors['image'] = "The image is too big!";
        }
    } else {
        $errors['image'] = "Please add a image!";
    }
    // var_dump($errors);
    if (empty($errors)) {
        define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'] . '/portfolio_php/upload/');
        // define('IMAGE_URL','http://localhost/portfolio_php/upload/');
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $image = time() . '_' . $_FILES['image']['name'];
        $link = $_POST['link'];
        // var_dump("tupian" . $image);
        // var_dump($titre);

        $insert = "INSERT INTO `project`(`titre`, `contenu`, `image`,`link`) VALUES (:titre,:contenu,:image,:link)";
        $req = $pdo->prepare($insert);
        $req->bindValue(':titre', $titre);
        $req->bindValue(':contenu', $contenu);
        $req->bindValue(':image', $image);
        $req->bindValue(':link', $link);
        if ($req->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . $image);
        } else {
            echo "Error executing the query: " . implode(", ", $req->errorInfo());
        }
    }
}
?>

<?php require_once "partials/header.php"; ?>

<h1 class="text-center">Add a new projet</h1>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titre">Title</label>
                    <input type="text" name="titre" class="form-control" placeholder="Title of projet">

                </div>
                <div class="form-group">
                    <label for="contenu">Description</label>
                    <textarea type="text" name="contenu" cols="30" rows="10" class="form-control" placeholder="Description of projet"><?= $_POST['contenu'] ?? '' ?></textarea>

                </div>
                <div class="form-group">
                    <label for="image">Photo</label>
                    <input type="file" name="image" class="form-control">

                </div>
                <div class="form-group">
                    <label for="link">link</label>
                    <input type="text" name="link" class="form-control">

                </div>

                <button type="submit" class="btn btn-warning mt-3">Add</button>
            </form>

        </div>
    </div>
</div>
<?php
require_once "partials/footer.php";
?>