<div class="table-responsive">
  <table class="table table-strip">
      <tbody>
        <tr>
            <?php
                foreach($_SESSION["panier"] as $key =>$val){
                    echo "<td>".$val."</td>";
                }
            
            ?>
        </tr>
      
      </tbody>
  </table>
</div>