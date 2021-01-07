<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>CATEGORY</th>
            <th>PRICE</th>
            <th>STOCK</th>
        </tr>

        <?php $no = 1;
        foreach ($product as $p) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p->name ?></td>
                <td><?= $p->description ?></td>
                <td><?= $p->category ?></td>
                <td><?= $p->price ?></td>
                <td><?= $p->stock ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>