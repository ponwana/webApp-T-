<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Detail</th>
      <th scope="col">Reference</th>
    </tr>
  </thead>
  <tbody>
    <?php if($news) : ?>
        <?php foreach($news as $value) : ?>
            <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $value['detail']; ?></td>
            <td><a href="<?php echo $value['reference']; ?>">View article</td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

  </tbody>
</table>