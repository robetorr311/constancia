<div class="selsistema">
	<select id="ssistema" class="form-control borsistema">
		<?php echo (empty($sistemas)) ? '<option value= "">No Hay Sistema</option>' : '' ?>
		<?php 
		$pid = null;
		foreach ($sistemas as $item): 
			if ($item->pid != $pid):
				if ($item->pid != null):
		?>
					</optgroup>
		<?php
				endif;
			$pid = $item->pid;
		?>
			<optgroup label="<?php echo $item->pnombre ?>">
		<?php endif	?>
				<option value="<?php echo $item->id ?>" <?php echo ($sys_actual == $item->id) ? 'selected' : ''?>><?php echo $item->nombre; ?></option>
		<?php endforeach; ?>
	</select>
</div>
