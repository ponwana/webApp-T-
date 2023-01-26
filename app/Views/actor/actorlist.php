<h1>Actor CRUD</h1>
<hr>
<div class="d-flex justify-content-end">
  <a href="<?php echo site_url('/addactor');?>" class="btn btn-primary">Add actor </a>
</div>
<hr>


<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($persons) : ?>
        <?php foreach($persons as $person) : ?>
            <tr>
            <td><?php echo $person['id']; ?></td>
            <td><?php echo $person['name']; ?></td>
            <td><?php echo $person['address']; ?></td>
            <td><img src="<?php echo base_url('images/' . $person['image']); ?>" width="100" height="100"></td>
            <td>
            <a href="<?php echo site_url('editactor/'.$person['id']);?>" class="btn btn-warning">Edit</a>
            <a href="<?php echo site_url('deleteactor/'.$person['id']);?>" onclick="return confirm('ยืนยันการลบข้อมูล !')" class="btn btn-danger">Delete </a>
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