<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=s, initial-scale=1.0">
  <title>MiniChat</title>
</head>
<body>

        <form action="index.php" method="POST">
            <p><label>Pseudo : <input type="text" name="pseudo"></label><br/></p>
            <p><label>Message: <input type="text" name="comment"></label><br/></p>
            <p><input type="submit"></p>
        </form>
          
        <?php 
          if(isset($_POST['pseudo']) AND isset($_POST['comment'])){
            $dbb = new PDO('mysql:host=localhost;dbname=minichat','root','');
            $ps = $_POST['pseudo'];
            $ms = $_POST['comment'];
            if(!empty($_POST['pseudo']) AND !empty($_POST['comment'])){
                $dbb->exec("INSERT INTO users(pseudo,comment) VALUE ('$ps','$ms')");
            }
            $reponse=$dbb->query('SELECT * FROM users');
            while($donnee = $reponse->fetch()){
              echo '<p>'.'<label style="font-weight: bold";>'.$donnee['pseudo'].'</label>'.' : '.$donnee['comment'].'</p>';
            }
          }
?>
</body>
</html>