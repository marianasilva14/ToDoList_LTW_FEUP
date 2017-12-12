<table id="todo_search">
     <tr><td> <class="table_toDo" href="category.php?cat_id=<?=$toDo[0]['cat_id']?>"><?=$toDo[0]['toDO_id']?> : <?=$toDo[0]['toDO_description']?>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</td>
       <td><class="table_toDo_priority" type="text" ><?=$toDo[0]['toDO_priority']?></td>
       <?php if($toDo[0]['toDO_priority']=='High priority'){
         $imagem= "images/higher.png";
       }
       else if($toDo[0]['toDO_priority']=='Medium priority'){
          $imagem= "images/medium.png";
       }
       else{
          $imagem= "images/lower.png";
       }?>
       <td>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<img src="<?php echo $imagem;?>"></td>
      <td><class="table_toDo_deadline" type="text" >&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?=$toDo[0]['toDO_deadline']?></td>
     </tr>
</table>
