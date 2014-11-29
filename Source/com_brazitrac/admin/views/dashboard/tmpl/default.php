<?php
/**
 * @package		$Id: default.php 2 2014-07-30 08:16:00Z RS $
 * @author 		Robert Skolnick
 * @copyright	2007-2014 BraziTech. All rights reserved.
 * @license		GNU/GPL.
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
 
// no direct access
defined('_JEXEC') or die;

?>
<div id="foobla">
	<div class="row-fluid">
		<div class="span8">
			<!-- icons -->
			<ul class="thumbnails">
				<li class="span3" style="margin-left: 15px;">
					<div class="thumbnail">
                                            <a href="index.php?option=com_brazitrac&task=announcments">
                                            <img src="components/com_brazitrac/assets/icons/announcements.png" alt="<?php echo JText::_('COM_BRAZITRAC_ANNOUNCEMENTS'); ?>">
                                            <h4><?php echo JText::_('COM_BRAZITRAC_ANNOUNCEMENTS'); ?></h4>
                                            </a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&task=glossary.list">
						<img src="components/com_brazitrac/assets/icons/glossary48.png" alt="<?php echo JText::_('COM_BRAZITRAC_GLOSSARY'); ?>">
						<h4><?php echo JText::_('COM_BRAZITRAC_GLOSSARY'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&task=faqcategories.list">
						<img src="components/com_brazitrac/assets/icons/faqcategory.png" alt="COM_BRAZITRAC_FAQ_CATEGORIES">
						<h4><?php echo JText::_('COM_BRAZITRAC_FAQ_CATEGORIES'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&task=faq.list">
						<img src="components/com_brazitrac/assets/icons/faq.png" alt="COM_BRAZITRAC_FAQ_FAQS">
						<h4><?php echo JText::_('COM_BRAZITRAC_FAQ_FAQS'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&task=requestcategory.list">
						<img src="components/com_brazitrac/assets/icons/requestcategory.png" alt="COM_BRAZITRAC_RC_REQUEST CATEGORIES">
						<h4><?php echo JText::_('COM_BRAZITRAC_RC_REQUEST_CATEGORIES'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&task=requests.list">
						<img src="components/com_brazitrac/assets/icons/requests.png" alt="COM_BRAZITRAC_R_REQUESTS">
						<h4><?php echo JText::_('COM_BRAZITRAC_R_REQUESTS'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&task=requestpriority.list">
						<img src="components/com_brazitrac/assets/icons/requestpriority.png" alt="COM_BRAZITRAC_RP_PRIORITY">
						<h4><?php echo JText::_('COM_BRAZITRAC_RP_PRIORITY'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						
						<img src="components/com_brazitrac/assets/icons/statistics.png" alt="COM_BRAZITRAC_STATISTICS">
						<h4><?php echo JText::_('COM_BRAZITRAC_STATISTICS'); ?></h4>
						</a>
					</div>
				</li>
				<li class="span3">
					<div class="thumbnail">
						<a href="index.php?option=com_brazitrac&view=reports">
						<img src="components/com_brazitrac/assets/icons/reports48.png" alt="COM_BRAZITRAC_REPORTS">
						<h4><?php echo JText::_('COM_BRAZITRAC_REPORTS'); ?></h4>
						</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="span4">
			<!-- credits -->
			<?php echo $this->loadTemplate('info'); ?>
			<?php echo $this->loadTemplate('jed'); ?>
		</div>
	</div>
</div>

<form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="adminForm">
    <!-- request options -->
    <input type="hidden" name="option"       value="com_brazitrac" />
    <input type="hidden" name="task"         value="" />
    <input type="hidden" name="targetType"   value="brazitrac" />
    <input type="hidden" name="targetIdentifier" value="brazitrac" />
    <input type="hidden" name="targetIdentifierAlias" value="<?php echo base64_encode(JText::_('Default Helpdesk Permissions')); ?>" />
    <input type="hidden" name="returnURI" value="<?php echo base64_encode(JRoute::_('index.php?option=com_brazitrac')); ?>" />
    <?php echo JHTML::_('form.token'); ?>
</form>



































<!--
<script type="text/javascript" src="components/com_brazitrac/assets/javascript/plootr/lib/excanvas/excanvas.js"></script>
<script type="text/javascript" src="components/com_brazitrac/assets/javascript/plootr/plootr_uncompressed.js"></script>

<div class="graph"> <canvas id="plotr1" height="500" width="600"> </canvas> </div>

<script type="text/javascript">
var Site={
			// Define a dataset.
			dataset : {
				'myFirstDataset': 	[[0, 3], [1, 2], [2, 1.414], [3, 2.3]],
				'mySecondDataset': 	[[0, 1.4], [1, 2.67], [2, 1.34], [3, 1.2]],
				'myThirdDataset': 	[[0, 0.46], [1, 1.45], [2, 1.0], [3, 1.6]],
				'myFourthDataset': 	[[0, 0.3], [1, 0.83], [2, 0.7], [3, 0.2]]
			},

			// Define options.
			options : {
				// Define a padding for the canvas node
				padding: {left: 30, right: 0, top: 10, bottom: 30},

				// Background color to render.
				backgroundColor: '#f2f2f2',

				// Use the predefined blue colorscheme.
				colorScheme: 'blue',

				// Set the labels.
			   	xTicks: [
					{v:0, label:'January'},
			      	{v:1, label:'Februari'},
			      	{v:2, label:'March'},
			      	{v:3, label:'April'}
				]
			},
			graph:function(){
				// Instantiate a new LineCart.
				var line = new Plotr.LineChart('lines1',Site.options);
				// Add a dataset to it.
				line.addDataset(Site.dataset);
				// Render it.
				line.render();

				// Instead of instantiating a new LineChart object,
				// you also can use reset(), that resets the options and datasets.
				line.reset();

				// Change some attributes.
				Object.extend(Site.options,{
					// Use the predefined red colorscheme.
					colorScheme: 'red',

					// Background color to render.
					backgroundColor: '#f2f2f2',

					shouldFill: false,

					// Set a custom colorScheme
					colorScheme: new Hash({
						'myFirstDataset': '#1c4a7e',
						'mySecondDataset': '#bb5b3d',
						'myThirdDataset': '#3a8133',
						'myFourthDataset': '#813379'
					}),

					// Set the labels.
					xTicks: [
						{v:0, label:'IE6'},
						{v:1, label:'IE7'},
						{v:2, label:'FF2'},
						{v:3, label:'Opera 9'}
					]
				});
				// Parse the table.
				line.addDataset(Site.dataset);
				// Render the BarChart.
				line.render('lines2', Site.options);
			}
		};
		window.addEvent('domready',Site.graph);
</script>
-->