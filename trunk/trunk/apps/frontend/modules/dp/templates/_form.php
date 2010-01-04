<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="dp-form" action="<?php echo url_for('dp/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('dp/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'dp/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['confidence']->renderLabel() ?></th>
        <td>
          <?php echo $form['confidence']->renderError() ?>
          <?php echo $form['confidence'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['alias']->renderLabel() ?></th>
        <td>
          <?php echo $form['alias']->renderError() ?>
          <?php echo $form['alias'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['category_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['category_id']->renderError() ?>
          <?php echo $form['category_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['synopsis']->renderLabel() ?></th>
        <td>
          <?php echo $form['synopsis']->renderError() ?>
          <?php echo $form['synopsis'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['context']->renderLabel() ?></th>
        <td>
          <?php echo $form['context']->renderError() ?>
          <?php echo $form['context'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['problem']->renderLabel() ?></th>
        <td>
          <?php echo $form['problem']->renderError() ?>
          <?php echo $form['problem'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['problem_details']->renderLabel() ?></th>
        <td>
          <?php echo $form['problem_details']->renderError() ?>
          <?php echo $form['problem_details'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['solution']->renderLabel() ?></th>
        <td>
          <?php echo $form['solution']->renderError() ?>
          <?php echo $form['solution'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['solution_details']->renderLabel() ?></th>
        <td>
          <?php echo $form['solution_details']->renderError() ?>
          <?php echo $form['solution_details'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['literature']->renderLabel() ?></th>
        <td>
          <?php echo $form['literature']->renderError() ?>
          <?php echo $form['literature'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['notes']->renderError() ?>
          <?php echo $form['notes'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
