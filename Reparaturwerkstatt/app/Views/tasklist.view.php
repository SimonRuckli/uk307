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
        <div class="table">
            <h4>Auftragsliste</h4>
            <table>
                <tr>
                    <th>Werkzeug</th>
                    <th>Erfasser</th>
                    <th>Dringlichkeit</th>
                    <th>Rückgabedatum</th>
                    <th>In Time</th>
                    <th>Bearbeiten</th>
                    <th>Schliessen</th>
                </tr>
                <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td><?= $task["tool"] ?? "" ?></td>
                        <td><?= $task["name"] ?? "" ?></td>
                        <td><?= $task["urgency"] ?? "" ?></td>
                        <td><?= getReturnDate($task["entryDate"], $task["urgency"]) ?? "" ?></td>
                        <td><?= getInTimeIcon($task["processing"], $task["entryDate"], $task["urgency"]) ?? "" ?></td>
                        <td><button type="submit" name="button" value="<?= $task["id"] ?>">⚙️</button></td>
                        <td><input type="checkbox" name="check<?= $task["id"] ?>" value="check<?= $task["id"] ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="form-actions">
                <br>
                <button class="btn btn-primary" type="submit" name="button" value="cancel">Neuen Auftrag erfassen</button>
                <button class="btn btn-secondary" type="submit" name="button" value="close">Aufträge schliessen</button>
            </div>
        </div>
    </form>
</body>

</html>