<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>
<a href="/add-products" class="button" type="">Ajouter</a>
<table class="styled-table">
    <thead>
    <tr>
        <th>N</th>
        <th>Titre</th>
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
            <td><?= $param->price ?></td>
            <td>

                <form  action="/product-delete/<?= $param->product_id ?>" method="POST">
                    <a href="/add-products" class="button" type="">Modifier</a>

                    <button type="submit" class="button">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php }; ?>
    <!-- and so on... -->
    </tbody>
</table>
