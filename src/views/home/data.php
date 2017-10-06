<?php function section_body($data)
{?>
   
<div class="container">          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>EMPNO</th>
        <th>ENAME</th>
        <th>JOB</th>
        <th>MGR</th>
        <th>HIREDATE</th>
        <th>SAL</th>
        <th>COMM</th>
        <th>DEPTNO</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i=0;$i<count($data);$i++) { ?>
      <tr>
        <td><?php echo $data[$i]->EMPNO ?></td>
        <td><?php echo $data[$i]->ENAME ?></td>
        <td><?php echo $data[$i]->JOB ?></td>
        <td><?php echo $data[$i]->MGR ?></td>
        <td><?php echo $data[$i]->HIREDATE ?></td>
        <td><?php echo $data[$i]->SAL ?></td>
        <td><?php echo $data[$i]->COMM ?></td>
        <td><?php echo $data[$i]->DEPTNO ?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>

    <?php }?>