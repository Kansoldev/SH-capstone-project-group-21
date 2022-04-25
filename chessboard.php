<!DOCTYPE html>
     <html> 
     <head> 
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body> 
  <h3>A ChessBoard </h3>
   <table width="400px" cellspacing="0px" cellpadding="0px" border="1px">
   <!-- cell 400px wide (8 columns x 60px) -->
  <?php
      for($row=1;$row<=8;$row++)
	  {
        // chessboard has at least 8 rows in the board
            echo "<tr>";
            for($col=1;$col<=8;$col++)
        {
      // at least 8 column  
            $total=$row+$col;
            
            if($total%2==0)
            {
              echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
            }
            else
            {
              echo "<td height=30px width=30px bgcolor=#000000></td>";
            }
        }
            echo "</tr>";
    }
  ?>
  </table>
  </body>
  </html>
