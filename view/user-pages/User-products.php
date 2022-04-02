<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<div class="product-table">
    <div style="display:flex; justify-content: center">
        <h3>LISTE DE MES ARTICLES</h3>
    </div>
    <a href="/add-products" class="button" type="">Ajouter un article</a>
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