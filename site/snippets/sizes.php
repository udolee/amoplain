<?php if ($page->fivecoltablebody()->isNotEmpty()): ?>

  <table>

    <?php if ($page->fiveColTableHeadOne()->isNotEmpty()): ?>
      <thead>
        <tr>
          <th><?php echo $page->fiveColTableHeadOne()->html() ?></th>
          <th><?php echo $page->fiveColTableHeadTwo()->html() ?></th>
          <th><?php echo $page->fiveColTableHeadThree()->html() ?></th>
        </tr>
      </thead>
    <?php endif ?>

    <tbody>
      <?php foreach($page->fivecoltablebody()->toStructure() as $tableBodyItem): ?>
        <tr>
          <td data-label="<?php echo $page->fiveColTableHeadOne()->html() ?>"><?php echo $tableBodyItem->table_col_1() ?></td>
          <td data-label="<?php echo $page->fiveColTableHeadTwo()->html() ?>"><?php echo $tableBodyItem->table_col_2() ?></td>
          <td data-label="<?php echo $page->threeColTableHeadThree()->html() ?>"><?php echo $tableBodyItem->table_col_3() ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>

  </table>

<?php endif ?>