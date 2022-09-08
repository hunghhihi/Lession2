<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="text-center pt-10">
            <form action="">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['result'] as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user['id'] ?></th>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <a href="<?php echo "/home/edit/?id=" . $user['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="<?php echo "/home/show/?id=" . $user['id']; ?>" class="btn btn-primary">show</a>
                            <a href="<?php echo "/home/copy/?id=" . $user['id']; ?>" class="btn btn-primary">copy</a>
                            <a href="<?php echo "/home/delete/?id=" . $user['id']; ?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <?php for ($i = 1; $i <= $data['page']; $i++) : ?>
                <a href="<?php echo "/home/?page=$i"; ?>" class="btn btn-primary"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>

</body>

</html>