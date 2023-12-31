<?php
require_once "partials/header.php";
?>
<div class="skills">
    <div id="skills" class="container-fluid">
        <div class="row">
            <div class="col-12 my-auto">
                <h2 class="p-5">Compétences</h2>
            </div>

            <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-0 col-lg-4 p-5 logo">
                <h3>Technologies</h3>
                <div class="dropdown-divider mb-5"></div>
                <?php
                $technologies = ['HTML', 'CSS', 'PHP', 'JavaScript', 'TypeScript', 'MySQL'];
                foreach ($technologies as $tech) {
                    echo '<p data-aos="fade-up" class="aos-init">' . $tech . '</p>';
                }
                ?>
            </div>

            <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-0 col-lg-4 p-5">
                <h3>Frameworks / bibliothèques</h3>
                <div class="dropdown-divider mb-5"></div>
                <?php
                $frameworks = ['Symfony', 'React', 'React Native', 'Bootstrap', 'FontAwesome', 'Twig'];
                foreach ($frameworks as $framework) {
                    echo '<p data-aos="fade-up" class="aos-init">' . $framework . '</p>';
                }
                ?>
            </div>

            <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-0 p-5">
                <h3>CMS</h3>
                <div class="dropdown-divider mb-5"></div>
                <?php
                $cms = ['PrestaShop', 'WordPress'];
                foreach ($cms as $cm) {
                    echo '<p data-aos="fade-up" class="aos-init">' . $cm . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>



<?php
require_once "partials/footer.php";
?>