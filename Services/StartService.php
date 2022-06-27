<?php

namespace Modules\Bibliography\Services;

use Modules\ACP\Services\StartServices;

class StartService extends StartServices
{
    protected string    $pagePrefix     =   'bibliography::forms.';
    protected array     $pageModules    =   [ 'book_title', 'book_author', 'book_blurb', 'read_at', 'book_cover', 'book_status', 'save' ];

    protected string    $tableBodyPrefix=   'bibliography::tableComponents.';
    protected array     $tableHeadNames =   [ 'Options', 'Buchcover', 'ID', 'Titel / Autor', 'Post!', 'More' ];
    protected array     $tableBodyViews =   [ 'options', 'cover', 'id',  'title', 'postsid', 'info' ];

    public function __construct() {

        parent::__construct();

        // Add Navigation Item
        $this->addMenu('Bibliography', 'bibliography.backend.index', true);

        // Create the Book Edit/Create Page
        $this->createPage('BibliographyEditPage', $this->pageModules, $this->pagePrefix );
        $this->createPage('BibliographyCreatePage', $this->pageModules, $this->pagePrefix );


        // Add Modules to BlogEdit/CreatePage
        app('BlogCreatePage')->add($this->pagePrefix . 'book', 5);
        app('BlogEditPage')->add($this->pagePrefix . 'book', 5);

        // Add TableIndex
        $this->createTable('BibliographyIndexTable', $this->tableHeadNames, $this->tableBodyViews);

    }
}
