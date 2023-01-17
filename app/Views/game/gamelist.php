<h1>Games CRUD</h1>
<hr>
<div class="d-flex justify-content-end">
  <a href="<?php echo site_url('/addgame');?>" class="btn btn-primary">Add Game </a>
</div>
<hr>
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Detial</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($items) : ?>
        <?php foreach($items as $item) : ?>
            <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['detail']; ?></td>
            <td>
            <a href="<?php echo site_url('editgame/'.$item['id']);?>" class="btn btn-warning">Edit</a>
            
            <a href="<?php echo site_url('deletegame/'.$item['id']);?>" onclick="return confirm('ยืนยันการลบข้อมูล !')" class="btn btn-danger">Delete </a>
            </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

  </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>