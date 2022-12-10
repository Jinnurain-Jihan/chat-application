
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chat Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style media="screen">
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap');

      body{
        background-color: #c0c0c0;
        margin: 0px;
        padding: 0px;
      }
      #p1{
        background-color: teal;
        color: #000;
        text-align: center;
        font-size: 40px;
        font-weight: bold;
        padding: 8px;
        font-family: 'Oleo Script', cursive;
        border-radius:5px 5px 0px 0px;
      }
      #div1{
        width: 800px;
        margin-left: 350px;
        margin-top: -20px;
        background-color: whitesmoke;
        padding-bottom: 30px;
        height: 610px;
        margin-bottom: 30px;
        box-shadow: 2px 2px 15px -5px rgba(0, 0, 0, 0.5);
        border-radius:5px;

      }
      #chat{
        width: 600px;
        height: 50px;
        float: left;
        margin-left: 20px;
        margin-bottom: 30px;
        margin-top:40px;
        font-size: 21px;
        border-radius:5px;
      }
      #chat:focus{
        outine:none;
      }
      #sendbutton{
        float: left;
        margin-top: 40px;
        width: 150px;
        height: 55px;
        font-size: 25px;
        font-weight: bold;
        margin-left: 5px;
        border-radius:5px;
        cursor:pointer;
      }
      table{
        margin-left: 440px;
      }
      #td1{
        float: right;
        background-color: #0083fe;
        padding: 10px;
        color: white;
        border-radius: 20px;
        max-width: 230px;
        font-size: 19px;
        margin-top: 6px;
        overflow:auto;
      }
      #div2{
        overflow: auto;
        width: 770px;
        height: 400px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div id="div1">
      <p id="p1">Chat Application</p>
      <div id="div2">
        <table>
          <?php
          error_reporting(0);
          include 'databaseconnect.php';
          $sql1="SELECT * from chat_info";
          $query1=mysqli_query($connect,$sql1);
           while ($info=mysqli_fetch_array($query1)) {
             ?>
             <tr>
               <td id="td1"><?php echo $info['Chat']; ?></td>
               <td id="td2"><?php echo formatDate($info['Time']); ?></td>
             </tr>

             <?php
           }

          ?>
        </table>

      </div>

      <form action="" method="post">
        <textarea id="chat" name="chat" rows="8" cols="80" placeholder="Write Message" required></textarea>
        <input id="sendbutton" type="submit" name="send" value="Send">

      </form>
      <?php
        ///include 'db.php';
        if (isset($_POST['send'])) {
          header("Location: chat.php");
          $chat=$_POST['chat'];
          $sql="INSERT INTO chat_info(Chat) values('$chat')";
          $query=mysqli_query($connect,$sql);

          // code...
        }

       ?>

    </div>

  </body>
</html>
