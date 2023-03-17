<?php

namespace BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Http\Controllers;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\SingletonModuleController as BaseModuleController;

class CookieController extends BaseModuleController
{
    protected $moduleName = 'cookies';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $wysiwygOptions = [
            ['header' => [4, 5, 6, false]],
            'bold',
            'italic',
            ['list' => 'bullet'],
            ['list' => 'ordered'],
            [ 'script' => 'super' ],
            [ 'script' => 'sub' ],
            'link',
            'clean',
        ];

        $form->push(
            Input::make()->name('cookie_banner_description')->type('textarea')->label('Cooke banner description'),
            Input::make()->name('settings_title')->type('text')->label('Settings popup title'),
            Wysiwyg::make()->name('settings_description')->toolbarOptions($wysiwygOptions)->allowSource(true)->label('Settings popup description'),
            BlockEditor::make()->blocks(['cookie-block']),
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }
}
