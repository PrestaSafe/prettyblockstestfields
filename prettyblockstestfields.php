
<?php

if (!defined('_PS_VERSION_')) {
    exit;
}


class PrettyBlocksTestFields extends Module
{
    protected $templateFile;

    public function __construct()
    {
        $this->name = 'prettyblockstestfields';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'PrestaSafe';
        $this->dependencies = ['prettyblocks'];
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Cartzilla TEST FIELDS');
        $this->description = $this->l('This is a test module');

        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
    }

    public function install()
    {
        parent::install();
        $this->registerHook('ActionRegisterThemeSettings');
        $this->registerHook('ActionRegisterBlock');
        $this->registerHook('ActionQueueSassCompile');

        return true;
    }

  

    

    public function uninstall()
    {
        return parent::uninstall() &&
        $this->unregisterHook('ActionRegisterThemeSettings') &&
        $this->unregisterHook('ActionRegisterBlock') &&
        $this->unregisterHook('ActionQueueSassCompile') &&
        $this->unregisterHook('beforeRenderingCzFeaturedProducts') &&
        $this->unregisterHook('beforeRenderingHeroProduct') &&
        $this->unregisterHook('beforeRenderingblockCategoryProducts');
    }

    
    public function hookActionRegisterThemeSettings()
    {
      
        return $this->getFieldsToTest();
        
    }

    private function getFieldsToTest()
    {
        return [
            //  color
            'color' => [
                'tab' => 'Design',
                'type' => 'color',
                'default' => 'red',
                // 'force_default_value' => true,
                'label' => $this->l('TEst color fields'),
            ],
            // file upload
            'fileupload' => [
                'type' => 'fileupload', // type of field
                'force_default_value' => true,
                'label' => $this->l('Logo'), // label to display
                'tab' => 'logo',
                'path' => '$/modules/'.$this->name.'/views/images/', // path to upload
                'default' => [
                    'url' => 'https://via.placeholder.com/200x200',
                ],
            ],
            //  text
            'text' => [
                'tab' => 'design',
                'type' => 'text',
                'default' => 'Top',
                'label' => $this->l('Top button text'),
            ],
            // textarea
            'textarea' => [
                'tab' => 'design',
                'type' => 'textarea',
                'default' => 'Top',
                'label' => $this->l('Top button text'),
            ],
            // editor
            'editor' => [
                'type' => 'editor', // type of field
                'label' => 'Editor', // label to display
                'default' => '<p>Hello <strong>World</strong> !' // default HTML value
            ],
            //  checkbox
            'checkbox' => [
                'type' => 'checkbox',
                'label' => $this->l('Use button first banner'),
                'force_default_value' => true, 
                'default' => true,
            ],
            // radio_group
            'radio_group' => [
                'type' => 'radio_group', // type of field
                'label' => 'Choose a value',  // label to display
                // 'force_default_value' => true, // force default value
                'default' => '3', // default value (String)
                'choices' => [
                    '1' => 'Radio 1',
                    '2' => 'Radio 2',
                    '3' => 'Radio 3',
                ]
            ],
            //  select
            'select' => [
                'type' => 'select',
                'label' => $this->l('Spacing'),
                'default' => '3',
                'force_default_value' => true, // force default value
                'choices' => [
                    '1' => 'Select 1',
                    '2' => 'Select 2',
                    '3' => 'Select 3',
                    '4' => 'Select 4',
                    '5' => 'Select 5',
                ],
            ],
            //  selector
            'selector' => [
                'type' => 'selector',
                'label' => $this->l('Category'),
                'collection' => 'Category',
                'force_default_value' => true, // force default value
                'default' => [
                    'show' => [
                        'id' => 3,
                        'primary' => 3,
                        'formatted' => '3 - Vêtements',
                        'name' => 'Vêtements',
                    ]
                ],
                'selector' => '{id} - {name}',
            ],
        ];
    }

    public function hookActionRegisterBlock()
    {
        $blocks = [];

        // spacing block
        $blocks[] = [
            'name' => $this->l('PrettyBlocks TEST'),
            'description' => $this->l('For testing all fields values'),
            'code' => 'pretty_test',
            'tab' => 'general',
            'insert_default_settings' => true,
            'icon' => 'BugAntIcon',
            'need_reload' => false,
            'templates' => [
                'default' => 'module:' . $this->name . '/views/templates/blocks/test.tpl',
            ],
            // repeater
            'config' => [
                'fields' => $this->getFieldsToTest()
            ],
            // reapeater
            'repeater' => [
                'name' => 'Element repeated',
                'nameFrom' => 'title',
                'groups' => $this->getFieldsToTest()
            ]

        ];
        return $blocks;
    }


    public function hookActionQueueSassCompile()
    {
        $vars = [
            'entries' => [
                '$/modules/' . $this->name . '/views/css/vars.scss',
            ],
            'out' => '$/themes/'.$this->name.'/views/css/vars.css',
        ];
        return [$vars];
    }
}
