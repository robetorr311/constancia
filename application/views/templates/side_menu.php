<?php foreach ($menus as $item): ?>
	<li class="<?php echo (!empty($item->childs)) ? 'treeview' : '' ?>">
		<a href="<?php echo $item->href ?>">
			<i class="<?php echo $item->icono ?>"></i><span><?php echo $item->titulo ?></span>
		<?php if (!empty($item->childs)): ?>
			<i class='fa fa-angle-left pull-right'></i>
		</a>
			<ul class='treeview-menu'>
			<?php foreach ($item->childs as $child): ?>
				<li>
					<a href="<?php echo $child->href ?>"><i class="<?php echo ($child->icono) ? $child->icono : 'fa fa-angle-double-right' ?>"></i><?php echo $child->titulo ?></a>
				</li>
			<?php endforeach ?>
			</ul>
		<?php else: ?>
		</a>
		<?php endif ?>
	</li>
<?php endforeach ?>
