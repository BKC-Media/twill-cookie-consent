@twillRepeaterTitle('cookie')
@twillRepeaterTitleField('cookie_name', ['hidePrefix' => true])
@twillRepeaterTrigger('Add cookie')
@twillRepeaterGroup('twill-cookie-consent')

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

<x-twill::input
    name="script"
    label="Add provider script here (e.g. Google Analytics)"
    note="Scripts will be placed in the <head> of the document."
    type="textarea"
/>