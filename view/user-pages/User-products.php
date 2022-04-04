
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
                    <textarea style="width: 270px;" name="description" type="text" value="<?= $params['product']->description ?? '' ?>"
                           placeholder="Description"></textarea>
                    <input name="image" type="file" accept="image/png, image/jpeg" value="<?= $params['product']->image ?? '' ?>"/>
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
<div id="id02" class="w3-modal">
    <div style="position: relative; animation: animatetop 0.4s;">
        <div class="product-form">
            <div class="form">
                    <span onclick="document.getElementById('id02').style.display='none'"
                          class="w3-button w3-display-topright">&times;</span>
                <h3 style="color:white; margin-bottom: 27px;">Modification d'un article</h3>
                <form action="/product-edit" method="post" enctype="multipart/form-data">
                    <!--            --><?php //echo'<pre>'; print_r($params['product']); echo'<pre>';?>
                    <input name="title_product" id="title" type="text" value="<?= $params['product']->title_product ?? '' ?>"
                    placeholder="Titre"/>
                    <input name="price" id="price" type="text" value="<?= $params['product']->price ?? '' ?>"
                    placeholder="Prix"/>
                    <textarea style="width: 270px;" name="description" id="description" type="textarea" value="<?= $params['product']->description ?? '' ?>" placeholder="Description">
                        </textarea>
                    <input name="image" type="file" accept="image/png, image/jpeg" value="<?= $params['product']->image ?? '' ?>"/>
                    <input style="display:none" name="product_id" id="id-product" type="text"/>
                    <br>
                    <br>
                    <div class="login-form">
                        <button type="submit">
                            Modifier
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
    <a onclick="document.getElementById('id01').style.display='block'" class="button-add add-product" type="">Ajouter un article</a>
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
                    <td style="display:none"><?= $param->description ?></td>

                    <td>

                        <form action="/product-delete/<?= $param->product_id ?>" method="POST">
<!--                            href="/product-edit/-->
                            <a onclick="document.getElementById('id02').style.display='block'" <?= $param->product_id ?> class="edit-button button" type=""><i class="fas fa-edit"></i></a>

                            <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer l\'article <?= $param->product_id ?>')" class="button"><i class="fas fa-trash-alt"></i></i></button>
                        </form>
                    </td>
                </tr>
            <?php };

            ?>

            <!-- and so on... -->
            </tbody>
            <?php if (empty($params['Userproducts'])) { ?>
                <tfoot style="position: relative;">
                <td style="position: absolute; width:100%; background: #f3f3f3;">
                    <div style="width: 100%; height: 20px;">

                        <p style="text-align: center">Aucun enregistrement</p>
                    </div>
                </td>
                </tfoot>
            <?php } ?>

        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.required').css('color','red');
        let reload = <?php echo json_encode($succes);?>;
        if(!reload){
            setTimeout(function () {
                // window.location.reload();
                window.location.href= '/signin';
            },1500);
        }else{
            if(reload === 1){
                setTimeout(function () {
                    // window.location.reload();
                    window.location.href= '/home';
                },1500);
            }
        }
    });
    function show() {
        var password = document.getElementById("password");
        var icon = document.querySelector(".fas");

        // ========== Checking type of password ===========
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password"
        }
    }
    $(document).ready(function () {

        $('.add-product').on('click', function () {

            $('#title').val("");
            $('#price').val("");
            $('#description').val("");
        });
    });

    $(document).ready(function () {

        $('.edit-button').on('click', function () {

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#id-product').val(data[0]);
            $('#title').val(data[1]);
            $('#price').val(data[3]);
            $('#description').val(data[4]);
        });
    });
</script>