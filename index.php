<?php
include "class/Student.php";
include "class/StudentManager.php";

$studentManager = new StudentManager("data/data.json");
$listStudents = $studentManager->getListStudents();
?>
<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<h2>Students Manager</h2>
<form method="get">

    <button class="btn btn-primary" type="button" onclick="document.location = 'view/add_view.php'">ADD STUDENT</button>

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Mail</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listStudents as $index => $student): ?>
            <tr>
                <th scope="row"><?php echo $index + 1 ?>
                    <input type="hidden" name="index" value="<?php echo $index ?>">
                </th>
                <td><?php echo $student->getName() ?></td>
                <td><?php echo $student->getEmail() ?></td>
                <td><?php echo $student->getPhone() ?></td>
                <td>
                    <a href="view/edit_view.php?index=<?php echo $index ?>" class="btn btn-primary">EDIT</a>
                    <a href="action/delete.php?index=<?php echo $index ?>" onclick="return confirm('ARE YOU SURE>')"
                       class="btn btn-danger">DELETE</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>
