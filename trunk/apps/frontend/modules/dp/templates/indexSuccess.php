<h1>Dps List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Problem</th>
      <th>Solution</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dps as $dp): ?>
    <tr>
      <td><a href="<?php echo url_for('dp/edit?id='.$dp->getId()) ?>"><?php echo $dp->getId() ?></a></td>
      <td><?php echo $dp->getName() ?></td>
      <td><?php echo $dp->getProblem() ?></td>
      <td><?php echo $dp->getSolution() ?></td>
      <td><?php echo $dp->getCreatedAt() ?></td>
      <td><?php echo $dp->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('dp/new') ?>">New</a>
