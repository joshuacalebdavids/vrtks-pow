# WordPress Starter Kit - Theme Support Plugin

## Naming Conventions:

#### Option fields

Option fields can be accessed globally using: `get_field( 'field_name', 'option' )`. As such we require unique names for the fields. When adding new option fields use names that are prefixed by their feature group. For example a phone number is a contact detail. So it's name would be `contact_details_phone_number`

```php
$contact_details_fields = array(
    array(
      'key'   => 'tab_contact_details',
      'label' => __( 'Contact Details', 'wsk-theme-support' ),
      'name'  => '',
      'type'  => 'tab',
    ),
    array(
      'key'   => 'field_contact_details_phone_number',
      'label' => __( 'Phone Number', 'wsk-theme-support' ),
      'name'  => 'contact_details_phone_number',
      'type'  => 'text',
    ),
)
```

#### Post type fields

When adding new fields for specific post types use names that are generic and not scoped to a post type, this is so we can have loops that work across different post types. For example a description field for a project post type would be named `description` NOT `project_description`.

```php
$field = array(
  'key'   => 'field_project_description',
  'label' => __( 'Description', 'wsk-theme-support' ),
  'name'  => 'description',
  'type'  => 'textarea',
);
```
