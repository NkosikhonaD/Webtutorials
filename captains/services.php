

<?php include('readstudents.php');
    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db,"SELECT * FROM personalinfo WHERE id ='$id'");
        $record = mysqli_fetch_array($rec);
        $Name =$record['Name'];
        $Surname=$record['Surname'];
        $studentno=$record['studentno'];
        $id =$record['id'];
    }
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
            <li class="current"><a href="services.php">Services</a></li>
            <li><a href="products.php">Read Students</a></li>
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
          <h1 class="page-title">Services</h1>
            <?php if (isset($_SESSION['msg'])): ?>
                <div class="msg">

                    <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    ?>
                </div>

            <?php endif ?>

          <table>
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Surname</th>
                  <th>Student Number</th>
                  <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
              <tr>
                <td><?php echo $row['Name']; ?></td>

                <td><?php echo $row['Surname'];?></td>

                <td><?php echo $row['studentno'];?></td>

                <td><a href="services.php?edit=<?php echo $row['id'];?>" class="edit_btn">Edit</a></td>
                <td><a href="services.php?del=<?php echo $row['id'];?>" class="del_btn">Delete</a></td>

              </tr>
            <?php } ?>
            </tbody>

          </table>

          <form method="post" action="readstudents.php">
              <input type="hidden" name="id" value ="<?php echo $id; ?>">
            <div class=input-group>
              <label>Name</label>
              <input type="text" name="Name" value="<?php echo $Name; ?>">
            </div>
            <div class=input-group>
              <label>Surname</label>
              <input type="text" name="Surname" value="<?php echo $Surname; ?>">
            </div>
            <div class=input-group>
              <label>Student Number</label>
              <input type="text" name="studentno" value="<?php echo $studentno; ?>">
            </div>
            <div class=input-group>

            <?php if ($edit_state==true): ?>
                <button type="submit" name="update" class ="btn">Update</button>
            <?php else: ?>
                <button type="submit" name="save" class ="btn">Save</button>
            <?php endif ?>
            </div>

          </form>

        </article>

        <aside id="sidebar">
          <div class="dark">
            <h3>Get A Quote</h3>
            <form class="quote">
  						<div>
  							<label>Name</label><br>
  							<input type="text" placeholder="Name">
  						</div>
  						<div>
  							<label>Email</label><br>
  							<input type="email" placeholder="Emial Address">
  						</div>
  						<div>
  							<label>Message</label><br>
  							<textarea placeholder="Message"></textarea>
  						</div>
  						<button class="button_1" type="submit">Send</button>
			</form>
          </div>
        </aside>
      </div>
    </section>
    <footer>
      <p>Captains IT, Copyright &copy; 2020</p>
    </footer>
  </body>
</html>
