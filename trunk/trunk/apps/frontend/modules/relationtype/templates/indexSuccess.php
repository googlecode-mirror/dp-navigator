<h1>Relation types List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($relation_types as $relation_type): ?>
    <tr>
      <td><a href="<?php echo url_for('relationtype/edit?id='.$relation_type->getId()) ?>"><?php echo $relation_type->getId() ?></a></td>
      <td><?php echo $relation_type->getName() ?></td>
      <td><?php echo $relation_type->getCreatedAt() ?></td>
      <td><?php echo $relation_type->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('relationtype/new') ?>">New</a>
