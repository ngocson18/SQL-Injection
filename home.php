<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Đã đăng nhập thành công</h1>
    <form method="GET" action="home.php">
      <input type="text" >
      <button name="search">Search</button>
      
    </form>
    <?php 
        require 'connect.php';
        $sql = "select * from user2";
        $result= mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)>0){
        ?> 
          <table>
            <tr>
              <th>id</th>
              <th>name</th>
              <th>dob</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?= $row["id"] ?></td>
              <td><?= $row["name"] ?></td>
              <td><?= $row["dob"] ?></td>
            </tr>
          <?php
        }
      }
    ?>
              </table>

</body>
</html>