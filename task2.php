<html>

<head>
    <title>TODO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a6185a6cd4.js"></script>
    <style>
    .btncircle {
  display:block;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  border: 1px solid red;

}
    </style>
</head>

<body >
    <?php
      include("connection.php");
      if (isset($_POST['submit'])) {

        $textarea = $_POST['textarea'];
        $sql = "INSERT INTO todo (todotask,date,checked) VALUES ('$textarea', CURRENT_TIME(),0)";
        $query = mysqli_query($connect, $sql);
      }
    ?>
    <div class="container">
        <div class="container-fluid ">
            <div class=" row " style="height:100px;">
                <div class="col mh-100 align-self-center ">
                    <h1 class="text-center " style="color:blue;"> TO DO</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <form method="post" >
                <div class="form-row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"
                                placeholder="text here " name="textarea">
                               <div class="input-group-append">
                                  <button type="submit" class="btn btn-danger   btncircle"  name="submit"><i class="fas fa-plus" style="font-size:10px;"></i>
                                  </button>
                               </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

</br>
        <div class="container " style="height:100%;border:none;">
            <div class="row" style="height:100%;">
                <div class="col  " >
                    <h3 class="text-primary">TO DO</h3>
                  </br>
                    <form method="post">
                        <table class=" table "  style="width:100%;">

                                <?php

                                   $result = mysqli_query($connect, "SELECT id,todotask,date FROM `todo` WHERE checked=0 ORDER BY date DESC");

                                   if (mysqli_num_rows($result) > 0) {

                                      while ($row = mysqli_fetch_array($result)) {

                                         $id = $row['id'];

                                  ?>
                             <tr >
                                 <td class="d-none"><input type="hidden" Value="<?php echo $id ?>" name="hiddenfield">
                                 </td >
                                 <td style="width:40%;height:100px;">
                                 <?php

                                    echo "<p>" . $row['date'] . "</p>";
                                    ?>
                                  </td>
                                 <td style="width:40%;height:100px;">
                                    <?php


                                       echo "<p>" . $row['todotask'] . "</p>";
                                    ?>
                                 </td>
                                 <td style="width:25%;" style="align:center;">
                                    <button type="button" class="btn  float-right" style="">
                                    <a href="update.php?id=<?php echo $row[id]; ?>"><i class="fas fa-check"></i>
                                    </a>
                                    </button>
                                </td>
                            </tr>
                              <?php

                                 }
                                 }
                              ?>
                         </table>
                     </form>
                 </div>

                 <div class="col  ">
                    <h3 class="text-primary">DONE</h3>
                  </br>
                    <form method="post">
                        <table class="table" style="width:100%;">
                            <?php

                              $resul = mysqli_query($connect, "SELECT id,todotask,date FROM `todo` WHERE checked=1 ORDER BY date DESC");
                               if (mysqli_num_rows($resul) > 0) {

                                  while ($ro = mysqli_fetch_array($resul)) {

                             ?>
                            <tr>
                                <td class="d-none"><input type="hidden" Value="<?php echo $id ?>" name="hiddenfield">
                                </td>
                                <td style="width:40%;height:100px;">
                                  <?php

                                      echo "<p>" . $ro['date'] . "</p>";
                                      ?>

                                <td style="width:40%;height:100px;">
                                    <?php


                                        echo "<p>" . $ro['todotask'] . "</p>";
                                    ?>
                                </td>

                                <td style="width:25%;">
                                   <button type="button" class="btn  float-right btn-lg">
                                   <a href="updat.php?id=<?php echo $ro[id]; ?>;&checked=1">
                                            <p color="black"><i class="fas fa-times"></i></p>
                                   </a>
                                   </button>
                                </td>
                            </tr>
                            <?php

                            }
                            }
                            ?>
                         </table>
                     </form>
                  </div>

            </div>
        </div>
     </div>
</body>
</html>
