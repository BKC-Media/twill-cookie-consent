@twillRepeaterTitle('cookie')
@twillRepeaterTitleField('cookie_name', ['hidePrefix' => true])
@twillRepeaterTrigger('Add cookie')
@twillRepeaterGroup('twill-cookie-consent')

@php
    $options = [
        [
            'value' => 'head',
            'label' => 'Inside <head>'
        ],
        [
            'value' => 'body',
            'label' => 'Top of <body>'
        ],
        [
            'value' => 'Footer',
            'label' => 'Inside <footer>'
        ],
    ];
@endphp

<x-twill::input
        name="cookie_name"
        label="Cookie name"
/>

<x-twill::wysiwyg
        name="text"
        label="Text"
        placeholder="Text"
        :toolbar-options="[
            'bold',
            'italic',
            ['list' => 'bullet'],
            ['list' => 'ordered'],
            [ 'script' => 'super' ],
            [ 'script' => 'sub' ],
            'link',
            'clean'
        ]"
/>

<x-twill::radios
        name="script_location"
        label="Script location"
        note="Pick where to include the script."
        default="head"
        :inline="true"
        :options="$options"
/>

<x-twill::input
    name="script"
    label="Add script"
    note="Add provider script here (e.g. Google Analytics) to include if cookie is accepted."
    type="textarea"
/>