<?php


/*  echo "<form class='' action='index.php' method='post'>
      <fieldset> <legend>Contact</legend>
        Sexe:  <input type='radio' name='geschlecht' value='Mr'> <label for='mr'>Mr</label>
        <input type='radio' name='geschlecht' value='Madame'> <label for='madame'>Madame</label>
        <br>Nom*: <input type='text' name='name' value='' >
      <br>Prénom*: <input type='text' name='nachname' value='' >
      <br>Email*: <input type='email' name='email' value='' >
     <br>Message: <br> <textarea name='message' rows='8' cols='80' placeholder='Your message!'></textarea>
      </fieldset>
      <br>
      <button type='submit' name='submit'>Envoyer</button>
    </form>"; */
    $to = 'kirschjulio@gmail.com';
    $message = $_POST["message"];
    $subject = ($_POST["subject"]);
    
echo "    <form class='' action='index.php' method='post'>
    <h2>CONTACT US</h2>
    <p type='Nom*:'><input type='text' name='name' value='' placeholder='Nom'></input></p>
      <p type='Prénom*:'><input type='text' name='nachname' value='' placeholder='Prénom'></input></p>
    <p type='Email*:'><input type='text' name='email' value='' placeholder='Email'></input></p>
    <p type='Subject:'><input type='text' name='subject' value='' placeholder='Subject'></input></p>
    <p type='Message:'><textarea name='message' rows='8' cols='80' placeholder='Your message!'></textarea>
    <br> <button type='submit' name='submit'>Envoyer</button>
  </form>";


if (isset($_POST["submit"])) {
if (empty($_POST["name"]) || empty($_POST["nachname"]) || empty($_POST["email"])
 || empty($_POST["message"]) || empty("subject")) {
echo "  <script type='text/javascript'>
    alert('Please fill everything!');
  </script>";
}
else {

      $sexe = $_POST["geschlecht"];
      $nom = strip_tags($_POST["name"]);
      $prenom = strip_tags($_POST["nachname"]);
      $email = strip_tags($_POST["email"]);
      $message = strip_tags($_POST["message"]);


      $link = mysqli_connect(HOST,DB_USER,DB_PASSWORD,DB_NAME)
          or die("ERROR: Could not connect to DB.");
    $sql = "INSERT INTO tblmessage
    VALUES ('$nom','$prenom','$email','$message')";

    $result = mysqli_query($link, $sql);
    if($result){
        echo "<script type='text/javascript'>
            alert('Message successfully sent!');
          </script>";
          mail($to, $subject, $message);
      }
      else {
        echo "Error! Please try again!";
        echo "print_r($sql)";
       }
      }
    }
 ?>
