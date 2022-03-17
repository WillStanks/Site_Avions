<html>

<body>
    <form action="filtrer.php">
    <option value="choix" selected="selected">Choix</option>
    <input type="checkbox" name="choix" checked="checked" />
    <select name="choix" value="defaut" />
    <input type="text" name="choix" value="defaut" />
    <textarea name="texte">defaut</textarea>
    <input type="radio" name="choix" checked="checked" />
    </form>

    <?php

    htmlspecialchars("alert('Surprise!!!')");
     ?>
   
   
</body>

</html>