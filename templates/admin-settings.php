<div class="wrap">

	<div class="rs-table-form">
		
		<h1>Range Slider Settings</h1>

		<form method="post" action="">
			<table >
				<thead>
					<tr>
						<th>Subscription</th>
						<th>Price</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($options_subscriber_price['subscription'] as $key => $value): ?>
					<tr>
						<td><input type="number" name="subscription[]" value="<?php echo $value; ?>" required></td>
						<td><input type="number" name="price[]" value="<?php echo $options_subscriber_price['price'][$key]; ?>" required></td>
						<td><button class="add" type="button"> + </button></td>
						<td><button class="remove" type="button"> - </button></td>
					</tr>
					<?php endforeach; ?>
					
				</tbody>
			</table>

			<?php wp_nonce_field('drs_options_subscriber_price_submit', 'drs_options_subscriber_price_form'); ?>
            <?php submit_button(); ?>
		</form>

	</div>

	<div class="rs-general">

		<h1>Help</h1>
		<p>Use the shortcode <strong>[rs-subscribers]</strong> to display the range slider in page/post.</p>
		<h1>General settings</h1>

		<form class="form-table" action="" method="post">
			<table>
				<tr>
					<th scope="row"><label for="title">Title</label></th>
					<td><input name="title" type="text" id="title" value="<?php echo $options_general['title']; ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="result">Result text</label></th>
					<td>
						<textarea name="result" id="result" class="regular-text" rows="5"><?php echo $options_general['result']; ?></textarea>
						<p class="description" id="result-description">Use [subscribers], [price] for auto updating the subscription count and price value.</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="peak">Peak message</label></th>
					<td><textarea name="peak" id="peak" class="regular-text" rows="5"><?php echo $options_general['peak']; ?></textarea></td>
				</tr>
			</table>
			<?php wp_nonce_field('drs_options_general_submit', 'drs_options_general_form'); ?>
            <?php submit_button(); ?>
		</form>
		
	</div>


</div>
