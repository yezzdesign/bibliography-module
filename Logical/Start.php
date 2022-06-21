<?php

namespace Modules\Bibliography\Logical;

use Illuminate\Support\Facades\Blade;
use Modules\ACP\Logical\Facades\Menu;
use Modules\ACP\Logical\Forms;


class Start
{
        public function __construct () {

            // Create Navigation Point
            Menu::add('Bibliography', 'bibliography.backend.index', true);

            // Create EDIT Form

            //$forms1 = Forms::class;
            //dd($forms1);
            //$forms1->add('bibliography::forms.book_title');
            //$forms1->render();

            //$forms = app(Forms::class);
            //app('EditForm')->add('bibliography::forms.book_title');
            //$forms->render();


            //$formsEdit  =   new Forms();
            app('EditForm')->add('bibliography::forms.book_title');
            app('EditForm')->add('bibliography::forms.book_author');
            app('EditForm')->add('bibliography::forms.book_blurb');
            app('EditForm')->add('bibliography::forms.read_at');
            app('EditForm')->add('bibliography::forms.book_cover');
            app('EditForm')->add('bibliography::forms.book_status');
            app('EditForm')->add('bibliography::forms.save');
            //$formsEdit->add('bibliography::forms.book_blurb');


            // Create Item for Index
            $this->addTableItems();

        }

        public function addTableItems() {

            // Set all Items that are collect from database
            Table::setDatabaseFields('id');
            Table::setDatabaseFields('read_at');
            Table::setDatabaseFields('book_title');
            Table::setDatabaseFields('book_cover');
            Table::setDatabaseFields('book_status');
            Table::setDatabaseFields('book_author');

            // Set the Header. Please think about the order
            Table::setDatabaseValues('Options');
            Table::setTableRowComponentsPath('bibliography::tableComponents.options');

            Table::setDatabaseValues('ID');
            Table::setTableRowComponentsPath('bibliography::tableComponents.id');

            Table::setDatabaseValues('Post?');
            Table::setTableRowComponentsPath('bibliography::tableComponents.postsid');

            Table::setDatabaseValues('Buchcover');
            Table::setTableRowComponentsPath('bibliography::tableComponents.cover');

            Table::setDatabaseValues('Titel / Autor');
            Table::setTableRowComponentsPath('bibliography::tableComponents.title');

            Table::setDatabaseValues('More');
            Table::setTableRowComponentsPath('bibliography::tableComponents.info');

        }

}
