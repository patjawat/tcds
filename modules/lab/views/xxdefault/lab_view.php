<h1>Lib View</h1>

<table class="table">
  <thead>
    <tr>
      <td>#</td>
      <td>	ชื่อผลตรวจ</td>
      <td>#</td>
      <td>#</td>
    </tr>
  </thead>
  <tbody>
    <?php $num = 1; foreach ($model as $data): ?>
    <tr>
      <td><?=$num++;?></td>
      <td><?=$data['test'];?></td>
      <td>#</td>
      <td>#</td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
