<?php
/**
 * @package		$Id: default_info.php 2 2014-07-30 08:16:00Z RS $
 * @author 		Robert Skolnick
 * @copyright	2007-2014 BraziTech. All rights reserved.
 * @license		GNU/GPL.
 */

// no direct access
defined('_JEXEC') or die;

global $option;
?>
	<table class="table table-striped">
		<tr>
			<td valign="top"><strong>Installed Version</strong></td>
			<td><strong><?php echo BrazitracHelper::getVersion(); ?></strong></td>
		</tr>
		
		<tr>
			<td valign="top"><strong>Copyright</strong></td>
			<td>(C) 2002-2014 <a href="http://brazitech.com" target="_blank">brazitech.com</a>.</td>
		</tr>
		
		
		<tr>
			<td valign="top"><strong>License</strong></td>
			<td>GNU/GPL.</td>
		</tr>
		
		<tr>
			<td valign="top"><strong>Credits</strong></td>
			<td>
				<ul style="margin: 0; padding-left: 15px;">
					<li><strong>Robert Skolnick</strong></li>

				</ul>
			</td>
		</tr>
	</table>