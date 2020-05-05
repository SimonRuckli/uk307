<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Reparaturwerkstatt</title>
        <link rel="stylesheet" href="public/css/css.css">
    </head>
    <body>
        <form action="validation" method="post">

                <lable for="name">Name</lable><br>
                <input name="name" type="text" id="name" require><br>

                <lable for="email">E-Mail</lable><br>
                <input name="email" type="email" id="email" require><br>

                <lable for="phone">Telefon</lable><br>
                <input name="phone" type="text" id="phone"><br>

                <lable>Dringlichkeit</lable><br>
                <select name="urgency" require>
                    <option value=""></option>
                    <option value="very_deep">Sehr tief</option>
                    <option value="deep">Tief</option>
                    <option value="normal">Normal</option>
                    <option value="high">Hoch</option>
                    <option value="very_high">Sehr hoch</option>
                </select><br>

                <lable for="tool">Betreffendes Werkzeug</lable><br>
                <input name="tool" type="text" id="tool" require><br>

            <button name="open">Auftragsliste öffnen</button>
            <button name="add">Auftrag hinzufügen</button>

        </form>
    </body>
</html>