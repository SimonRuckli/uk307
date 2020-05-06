<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Auftragsliste</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/css.css" rel="stylesheet">
</head>

<body>
    <form action="tasklist" method="post">
        <div class="wrapper">
            <h4>Auftragsliste</h4>
            <table style="width:100%">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Dringlichkeit</th>
                    <th>Werkzeug</th>
                    <th>Bearbeiten</th>
                </tr>
                <?php foreach ($tasks as  $count => $task) : ?>
                    <tr>
                        <td><?= $task["name"]    ?? "" ?></td>
                        <td><?= $task["email"]   ?? "" ?></td>
                        <td><?= $task["phone"]   ?? "" ?></td>
                        <td><?= $task["urgency"] ?? "" ?></td>
                        <td><?= $task["tool"]    ?? "" ?></td>
                        <td><button type="submit" name="button" value="<?= $task["id"] ?>">⚙️</button></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="form-actions">
                <br>
                <button class="btn btn-primary" type="submit" name="button" value="cancel">Zurück</button>
            </div>

        </div>
    </form>
</body>
</html>