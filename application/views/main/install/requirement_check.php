<?php $error=0; ?>
<h2>Requirement check</h2>
<p>This page show you wheteher your system environment is good enough or not to run Kalkun.</p>

<table border="0" cellspacing="0" cellpadding="0" class="simpletable">
	<tr>
		<th>Component</th>
		<th>Required</th>
		<th>Installed</th>
		<th class="right">Status</th>
	</tr>
	
	<tr>
		<td>PHP</td>
		<td>>= 5.0.0</td>
		<td><?php echo PHP_VERSION;?></td>
		<td class="right">
			<?php if(version_compare(PHP_VERSION, '5.0.0', '>=')) echo "<span class=\"green\">OK</span>"; 
			else { echo "<span class=\"red\">Not OK</span>"; $error++; }
			?>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="background-color: #cce9f2" class="right"><b>PHP extension/module</b></td>
	</tr>
	
	<tr>
		<td colspan="3">MySQL or SQLite3 (Using PDO)</td>
		<td class="right">
		<?php 
			if(extension_loaded('mysql')) $db_msg = "MySQL";
			if(extension_loaded('pdo_sqlite')) $db_msg = "SQLite3";
			if(extension_loaded('mysql') && extension_loaded('sqlite3')) $db_msg = "Both";
			
			if(isset($db_msg)) echo "<span class=\"green\">OK (".$db_msg.")</span>"; 
			else { echo "<span class=\"red\">Not OK</span>"; $error++; } 
		?>
		</td>
	</tr>

	<tr>
		<td colspan="3">Session</td>
		<td class="right"><?php if(extension_loaded('session')) echo "<span class=\"green\">OK</span>"; else { echo "<span class=\"red\">Not OK</span>"; $error++; }?></td>
	</tr>
	
	<tr>
		<td colspan="3">Hash</td>
		<td class="right"><?php if(extension_loaded('hash')) echo "<span class=\"green\">OK</span>"; else { echo "<span class=\"red\">Not OK</span>"; $error++; }?></td>
	</tr>

	<tr>
		<td colspan="3" class="bottom">JSON</td>
		<td class="right bottom"><?php if(extension_loaded('json')) echo "<span class=\"green\">OK</span>"; else { echo "<span class=\"red\">Not OK</span>"; $error++; }?></td>
	</tr>

</table>

<p>&nbsp;</p>

<?php if($error>0): ?>
<div>
<p>Ooopss, looks like your system is not good enough to run Kalkun, please provide all requirement above.</p>
</div>

<?php else: ?>
<div>
<p>Looks like everything is OK, let's continue.</p>
<p><a href="<?php echo site_url();?>/install" class="button">&lsaquo; Back</a>
<a href="<?php echo site_url();?>/install/database_setup" class="button">Next &rsaquo;</a></p>
</div>
<?php endif; ?>