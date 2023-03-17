@twillBlockTitle('Cookie category')
@twillBlockGroup('cookie-consent')
@twillBlockComponent('twill-cookie-consent-blocks::cookie-block')

@php
    $wysiwygOptions = [
      ['header' => [3, 4, 5, 6, false]],
      'bold',
      'italic',
      'underline',
      'strike',
      ["script" => "super"],
      ["script" => "sub"],
      "blockquote",
      "code-block",
      ['list' => 'ordered'],
      ['list' => 'bullet'],
      ['indent' => '-1'],
      ['indent' => '+1'],
      'link',
      "clean",
    ];
@endphp

<x-twill::input
        name="cookie_category_name"
        label="Cookie name"
/>

<x-twill::wysiwyg
    name="cookie_category_text"
    label="Cookie category text"
    :toolbar-options="$wysiwygOptions"
    placeholder="A Description of the cookie category"
    :edit-source="true"
/>

<x-twill::repeater
    type="cookie"
/>