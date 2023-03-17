@twillRepeaterTitle('cookie')
@twillRepeaterTitleField('cookie_name', ['hidePrefix' => true])
@twillRepeaterTrigger('Add cookie')
@twillRepeaterGroup('cookie-consent')

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