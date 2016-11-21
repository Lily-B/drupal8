<?php

namespace Drupal\Tests\conditional_fields\FunctionalJavascript;

use Drupal\Tests\conditional_fields\FunctionalJavascript\ConditionalFieldBase as JavascriptTestBase;
use Drupal\field\Tests\EntityReference\EntityReferenceTestTrait;

/**
 * Test Conditional Fields States.
 *
 * @group conditional_fields
 */
class ConditionalFieldTermTest extends JavascriptTestBase {

  use EntityReferenceTestTrait;

  /**
   * The label for a random field to be created for testing.
   *
   * @var string
   */
  protected $fieldLabel;

  /**
   * The input name of a random field to be created for testing.
   *
   * @var string
   */
  protected $fieldNameInput;

  /**
   * The name of a random field to be created for testing.
   *
   * @var string
   */
  protected $fieldName;

  /**
   * Tests creating Conditional Field: Visible if value = 41.
   */
  public function testCreateConfig() {
    $admin_account = $this->drupalCreateUser([
      'view conditional fields',
      'edit conditional fields',
      'delete conditional fields',
      'administer nodes',
      'administer node fields',
      'administer node form display',
      'create article content',
      'edit any article content',
      'administer taxonomy',
    ]);
    $this->drupalLogin($admin_account);

// 1. Check if the Fruit Voc and needed terms sre installed.
    // Visit a Taxonomy page for Fruit Voc.
    $this->drupalGet('admin/structure/taxonomy');
    $this->assertSession()->statusCodeEquals(200);

    // Configuration page contains the `Vocabulary` "Fruit Voc".
    $this->assertSession()->pageTextContains('Fruits Voc');

// 2. Add a field with taxonomy term to 'Article'.
    // Visit a 'Article' 'Add field' page for adding new field.
    $this->drupalGet('admin/structure/types/manage/article/fields/add-field');
    $this->assertSession()->statusCodeEquals(200);

    // Create random field name with markup to test escaping.
    $this->fieldLabel = '<em>' . $this->randomMachineName(8) . '</em>';
    $this->fieldNameInput = strtolower($this->randomMachineName(8));
    $this->fieldName = 'field_' . $this->fieldNameInput;

    $handler_settings = [
      'target_bundles' => [
        'fruits_voc',
      ],
    ];

    $this->createEntityReferenceField('node', 'article', $this->fieldName, $this->fieldNameInput, 'taxonomy_term', 'default', $handler_settings);

    entity_get_form_display('node', 'article', 'default')
      ->setComponent($this->fieldName, ['type' => 'options_buttons'])
      ->save();

    // Visit a 'Article' 'Manage fields' page to check is there a new field.
    $this->drupalGet('admin/structure/types/manage/article/fields');
    $this->assertSession()->statusCodeEquals(200);

    // Configuration page contains new field.
    $this->assertSession()->pageTextContains($this->fieldName);
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr1ArticleFields.jpg');

    // Visit a 'Article' 'Manage form display' page to check if new
    // field is with checkboxes.
    $this->drupalGet('admin/structure/types/manage/article/form-display');
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr2ArticleFromDisplay.jpg');

// 3. Add field condition.
    // Visit a ConditionalFields configuration page that requires login.
    $this->drupalGet('admin/structure/conditional_fields');
    $this->assertSession()->statusCodeEquals(200);

    // Configuration page contains the `Content` entity type.
    $this->assertSession()->pageTextContains('Content');

    // Visit a ConditionalFields configuration page for Content bundles.
    $this->drupalGet('admin/structure/conditional_fields/node');
    $this->assertSession()->statusCodeEquals(200);

    // Configuration page contains the `Article` bundle of Content entity type.
    $this->assertSession()->pageTextContains('Article');

    // Visit a ConditionalFields configuration page for `Article` Content type.
    $this->drupalGet('admin/structure/conditional_fields/node/article');
    $this->assertSession()->statusCodeEquals(200);
    $dependency = [
      'table[add_new_dependency][dependent]' => 'body',
      'table[add_new_dependency][dependee]' => $this->fieldName,
      'table[add_new_dependency][state]' => 'visible',
      'table[add_new_dependency][condition]' => 'value',
    ];
    $this->submitForm($dependency, 'Add dependency');
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr3CondEdit.jpg');


    // Change a condition values set and the value.
    $this->changeField('#edit-values-set', '2');
    $this->changeField('#edit-values', '1');

    // Submit the form.
    $this->getSession()
      ->executeScript("jQuery('#edit-submit--2').click();");
    $this->assertSession()->assertWaitOnAjaxRequest();
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr4CondSubm.jpg');

// 4. Check if the field condition works.
    $this->drupalGet('node/add/article');
    $this->assertSession()->statusCodeEquals(200);
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr5ArticleAdd.jpg');

    // Check that the field Body is not visible.
    $this->waitUntilHidden('.field--name-body', 0, 'Article Body field is visible');

    // Change a value set to show the body.
    $this->getSession()
      ->executeScript("jQuery('#edit-field-" . $this->fieldNameInput . "-1').click();");
    $this->waitUntilVisible('.field--name-body', 50, 'Article Body field is not visible');
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr6BodyVis.jpg');

    $this->getSession()
      ->executeScript("jQuery('#edit-field-" . $this->fieldNameInput . "-2').click();");
    $this->waitUntilHidden('.field--name-body', 50, 'Article Body field is visible');
    $this->createScreenshot('/var/www/drupal8.local/sites/simpletest/scr7BodyHid.jpg');
  }

}
