<h1>Problem/Solution Summary</h1>

<table class="summary">
  <thead>
    <tr>      
      <th>Problem</th>
      <th>Solution</th>
	  <th>Pattern Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dps as $dp): ?>
    <tr>
      <td><?php echo $dp->getProblem() ?></td>
      <td><?php echo $dp->getSolution() ?></td>
      <td><a href="<?php echo url_for('dp/view?id='.$dp->getId()) ?>"><?php echo $dp->getName() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('dp/new') ?>">New</a>
