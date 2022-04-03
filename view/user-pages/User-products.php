<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>

<?php
$message = false;
$succes = -1;
if(isset($_GET['success'])){
    $succes = $_GET['success'];
    $message    =   ($succes) ? "Connexion reussie"     :    "Echec: Informations incorrectes";
    $class      =   ($succes) ? "btn btn-success"       :    "btn btn-danger";
}
?>
<div id="id01" class="w3-modal">
    <div style="position: relative; animation: animatetop 0.4s;">
        <div class="product-form">
            <div class="form">
                    <span onclick="document.getElementById('id01').style.display='none'"
                          class="w3-button w3-display-topright">&times;</span>
                <h3 style="color:white; margin-bottom: 27px;"><?= isset($params['product']) ? "Modification" : "Ajouter" ?>
                    un
                    article</h3>
                <form action="<?= isset($params['product']) ? "/product-edit/{$params['product']->product_id}" : "/create-products" ?>"
                      method="post" enctype="multipart/form-data">
                    <!--            --><?php //echo'<pre>'; print_r($params['product']); echo'<pre>';?>
                    <input name="title_product" type="text" value="<?= $params['product']->title_product ?? '' ?>"
                           placeholder="Titre"/>
                    <input name="price" type="text" value="<?= $params['product']->price ?? '' ?>"
                           placeholder="Prix"/>
                    <input name="description" type="text" value="<?= $params['product']->description ?? '' ?>"
                           placeholder="Description"/>
                    <input name="image" type="file" value="<?= $params['product']->image ?? '' ?>"/>
                    <br>
                    <br>
                    <div class="login-form">
                        <button type="submit">
                            <?= isset($params['product']) ? "Modifier" : "Ajouter" ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="product-table">
    <div style="display:flex; justify-content: center">
        <h3>LISTE DE MES ARTICLES</h3>
    </div>
    <a onclick="document.getElementById('id01').style.display='block'" class="button-add" type="">Ajouter un article</a>
    <div style="display: flex; justify-content: center">
        <table class="styled-table">
            <thead>
            <tr>
                <th>N</th>
                <th>Titre</th>
                <th>description</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <!--    --><?php //echo '<pre>';print_r($params['Userproducts']); echo '<pre>';?>

            <?php foreach ($params['Userproducts'] as $key => $param) { ?>
                <tr>
                    <td><?= $param->product_id ?></td>
                    <td><?= $param->title_product ?></td>
                    <td><?= substr($param->description, 0, 30) . '...' ?></td>
                    <td><?= $param->price ?></td>
                    <td>

                        <form action="/product-delete/<?= $param->product_id ?>" method="POST">
                            <a href="/product-edit/<?= $param->product_id ?>" class="button" type=""><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                            <button type="submit" class="button"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php }; ?>
            <!-- and so on... -->
            </tbody>
        </table>
    </div>
</div>