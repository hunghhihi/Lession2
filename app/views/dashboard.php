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
            <a href="home/logout" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Logout</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $data['result']['username'] ?></th>
                    <th scope="row"><?= $data['result']['email'] ?></th>
                    <td>
                        <a href="home/edit/?id=<?= $data['result']['id'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>