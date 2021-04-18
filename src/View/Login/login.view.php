<?php $title = 'Page de connexion'; ?>
<?php ob_start(); ?>
<main class="container">
    <div class="row mt-4">
        <div class="col-12 col-md-6 m-auto bg-light bg-gradient p-4 rounded border ">
            <h1>Connecter vous!</h1>
            <?php include("src/View/partials/_errors.php"); ?>
            <form method="POST" data-parsley-validate>

                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control" id="email" aria-describedby="email"
                        value="<?= get_input_data('email') ?>" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <input type="submit" name="login" class="btn btn-primary" value="Connexion" />
            </form>
        </div>
        <div class="col-12 col-md-6 m-auto  ">
            <h4>Email et mot de passe pour le test!</h4>
            <table>
                <tr>
                    <td>Email </td>
                    <td>:&ensp;&ensp; </td>
                    <td>admin@gmail.com</td>
                </tr>
                <tr>
                    <td>Password </td>
                    <td>:&ensp;&ensp; </td>
                    <td>123456</td>
                </tr>
            </table>
        </div>

    </div>


</main>
<?php $content = ob_get_clean(); ?>

<?php require('src/View/template.php'); ?>