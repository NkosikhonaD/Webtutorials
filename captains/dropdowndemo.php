
<?php include('readonly.php');
$query = "SELECT * from personalinfo";

$query2 = "SELECT Name FROM personalinfo";
if(isset($_POST['confirm']))
{

    $selectRadio = $_POST['radio'];
    if($selectRadio =="All")
    {

        $query = "SELECT * from personalinfo";

    }
    if($selectRadio=="Names")
    {

        $query = "SELECT * from personalinfo where Name like '%Tha%'";

    }

}
$myResults = mysqli_query($db,$query) or die(mysqli_error($db));
$myNamesResults= mysqli_query($db,$query2) or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable Digital Solutions">
	  <meta name="keywords" content="Application Development, Computer hardware suppliers, Lab and office computer maintanace">
  	<meta name="author" content="DlaminiN3" >
    <title>Captains IT | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Captains</span>IT Solutions</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li class="current"><a href="dropdowndemo.php">Drop Down Demo</a></li>
            <li><a href="about.php">About</a></li>

          </ul>
        </nav>
      </div>
    </header>

    <section id="newsletter">
      <div class="container">
        <h1>Subscribe To Our Newsletter</h1>
        <form>
          <input type="email" placeholder="Enter Email...">
          <button type="submit" class="button_1">Subscribe</button>
        </form>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <article id="main-col">
          <h1 class="page-title">Display Students</h1>
          <?php if (isset($_SESSION['msg'])): ?>
                <div class="msg">

                    <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif ?>
          <form  method = "post" action = "products.php">
              <fieldset>
                  <legend>Select Radio</legend>
                  <input type="radio" name= "radio" value ="All"/> All
                  <input type ="radio" name= "radio" value = "Names"/> Names
              </fieldset>
              <button type="submit" name ="confirm" class="btn">Confirm</button>
          </form>
          <table>
            <thead>
             <?php echo "<tr>";
                while($property=mysqli_fetch_field($myResults))
                {
                    echo "<th>" . $property->name . "</th";

                }
                echo "</tr>";
             ?>
            </thead>
            <tbody>
                <select>
                <?php while ($row = mysqli_fetch_array($myResults)) { ?>
                  <tr>
                    <td><?php echo $row['Name']; ?></td>

                    <td><?php echo $row['Surname'];?></td>

                    <td><?php echo $row['studentno'];?></td>
                  </tr>
                <?php } ?>
                <select class="container" name=" Student Names">
                    <?php
                    while ($row = mysqli_fetch_array($myNamesResults))
                    {
                         $name1 = $row['Name'];
                         echo "<option value ='$name1'>$name1</option>";
                     }
                    ?>
                </select>
            </tbody>
          </table>
        </article>
      </div>
    </section>
    <footer>
      <p>Captains IT, Copyright &copy; 2020</p>
    </footer>
  </body>
</html>
