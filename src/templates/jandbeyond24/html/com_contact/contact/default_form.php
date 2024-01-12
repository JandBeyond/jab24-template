<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');

if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate">
		<fieldset>
			<legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
			
			<div class="contact-fields form-group">
				<div class="name-label"><label id="jform_contact_name-lbl" for="jform_contact_name" class="hasPopover required invalid" title="" data-content="Your name." data-original-title="Name">
						Name<span class="star">&nbsp;*</span></label>
				</div>
				<div class="name-input"><input type="text" name="jform[contact_name]" id="jform_contact_name" value="" class="form-control required invalid" size="30" required="required" aria-required="true" aria-invalid="true"></div>
			</div>
			<div class="contact-fields form-group">
				<div class="email-label"><label id="jform_contact_email-lbl" for="jform_contact_email" class="hasPopover required" title="" data-content="Email Address for contact." data-original-title="Email">
						Email<span class="star">&nbsp;*</span></label>
				</div>
				<div class="email-input"><input type="email" name="jform[contact_email]" class="form-control validate-email required" id="jform_contact_email" value="" size="30" autocomplete="email" required="required" aria-required="true"></div>
			</div>
			<div class="contact-form-field form-group">
				<div class="subject-label"><label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg" class="hasPopover required" title="" data-content="Enter the subject of your message here." data-original-title="Subject">
						Subject<span class="star">&nbsp;*</span></label>
				</div>
				<div class="subject-input"><input type="text" name="jform[contact_subject]" id="jform_contact_emailmsg" value="" class="form-control required" size="60" required="required" aria-required="true"></div>
			</div>
			<div class="message-form form-group">
				<div class="message-label"><label id="jform_contact_message-lbl" for="jform_contact_message" class="hasPopover required" title="" data-content="Enter your message here." data-original-title="Message">
						Message<span class="star">&nbsp;*</span></label>
				</div>
				<div class="message-input"><textarea name="jform[contact_message]" id="jform_contact_message" cols="50" rows="10" class="form-control required" required="required" aria-required="true"></textarea></div>
			</div>
                          
            <div class="message-form form-group">
				<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
                  <?php if ($fieldset->name != 'captcha') : ?>
                      <?php continue; ?>
                  <?php endif; ?>
                  <?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field) : ?>
						<?php echo $field->renderField(); ?>
					<?php endforeach; ?>
                <?php endforeach; ?>
			</div>

			<div class="send-btn">
				<button class="button" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
			</div>

			<input type="hidden" name="option" value="com_contact" />
			<input type="hidden" name="task" value="contact.submit" />
			<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
			<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</fieldset>
	</form>
</div>


