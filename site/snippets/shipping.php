<?php if ($page->fourColtablebody()->isNotEmpty()): ?>
<!-- Tab Content Shipping Start -->
<div class="shipping tab__content pv3 f6 fw3">
    <table class="collapse w-100 f6">
        
          <?php if ($page->fourColTableHeadOne()->isNotEmpty()): ?>
          <thead>
            <tr class="bb b--black-05">
                <th class="pv3 tl fw3"><?php echo $page->fourColTableHeadOne()->html() ?></th>
                <th class="pv3 tl fw3"><?php echo $page->fourColTableHeadTwo()->html() ?></th>
                <th class="pv3 tl fw3"><?php echo $page->fourColTableHeadThree()->html() ?></th>
                <th class="pv3 tl fw3"><?php echo $page->fourColTableHeadFour()->html() ?></th>
            </tr>
          </thead>
          <?php endif ?>

          <tbody>
            <?php foreach($page->fourColtablebody()->toStructure() as $tableBodyItem): ?>
            <tr class="bb b--black-05">
                <td class="pv3 fw3" data-label="<?php echo $page->fourColTableHeadOne()->html() ?>"><?php echo $tableBodyItem->table_col_1() ?></td>
                <td class="pv3 fw3" data-label="<?php echo $page->fourColTableHeadTwo()->html() ?>"><?php echo $tableBodyItem->table_col_2() ?></td>
                <td class="pv3 fw3" data-label="<?php echo $page->fourColTableHeadThree()->html() ?>"><?php echo $tableBodyItem->table_col_3() ?></td>
                <td class="pv3 fw3" data-label="<?php echo $page->fourColTableHeadFour()->html() ?>"><?php echo $tableBodyItem->table_col_4() ?></td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<!-- Tab Content Shipping End -->
<?php endif ?>