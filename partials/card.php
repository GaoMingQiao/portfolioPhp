<?php
require_once "./inc/database.php";
$select = "select * from project";

$query = $pdo->prepare($select);
$query->execute();
$projects = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($projects);

?>
<?php foreach ($projects as $project) : ?>
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">

                <h3 class="mb-0">
                    <a class="text-dark" href="#"><?php echo $project['titre']; ?></a>
                </h3>

                <p class="card-text mb-auto"><?php echo $project['contenu']; ?></p>

            </div>

            <a href="<?php echo $project['link']; ?>" target="_blank"><img class="card-img-right flex-auto d-none d-md-block img-fluid" src="./upload/<?php echo $project['image']; ?>" style="height: 200px;width:500px;" alt="Card image cap"></a>
        </div>
    </div>
<?php endforeach; ?>