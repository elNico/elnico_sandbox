<?php

/**
 * Implementation of hook_fieldgroup_default_groups().
 */
function wotsnxt_features_fieldgroup_default_groups() {
  $groups = array();

  // Exported group: group_custom
  $groups['page-group_custom'] = array(
    'group_type' => 'standard',
    'type_name' => 'page',
    'group_name' => 'group_custom',
    'label' => 'Custom group',
    'settings' => array(
      'form' => array(
        'style' => 'fieldset',
        'description' => '',
      ),
      'display' => array(
        'description' => '',
        'label' => 'above',
        'teaser' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'full' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        '4' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
      ),
    ),
    'weight' => '33',
    'fields' => array(
      '0' => 'field_txt1',
    ),
  );

  // Translatables
  array(
    t('Custom group'),
  );

  return $groups;
}
