<?php

namespace MaxBeckers\AmazonAlexa\Response\Directives\Display;

use MaxBeckers\AmazonAlexa\Helper\SerializeValueMapper;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class Template implements \JsonSerializable
{
    use SerializeValueMapper;

    const BACK_BUTTON_MODE_HIDDEN  = 'HIDDEN';
    const BACK_BUTTON_MODE_VISIBLE = 'VISIBLE';

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var string|null
     */
    public $token;

    /**
     * @var string|null
     */
    public $backButton;

    /**
     * @var Image|null
     */
    public $backgroundImage;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var TextContent|null
     */
    public $textContent;

    /**
     * @var Image|null
     */
    public $image;

    /**
     * @var ListItem[]
     */
    public $listItems = [];

    /**
     * @param ListItem $item
     */
    public function addListItem(ListItem $item)
    {
        $this->listItems[] = $item;
    }

    /**
     * @param string|null      $type
     * @param string|null      $token
     * @param string|null      $backButton
     * @param string|null      $backgroundImage
     * @param string|null      $title
     * @param TextContent|null $textContent
     * @param Image|null       $image
     * @param ListItem[]       $listItems
     *
     * @return Template
     */
    public static function create($type, $token, $backButton = self::BACK_BUTTON_MODE_VISIBLE, $backgroundImage = null, $title = null, $textContent = null, $image = null, $listItems = []): self
    {
        $template = new self();

        $template->type            = $type;
        $template->token           = $token;
        $template->backButton      = $backButton;
        $template->backgroundImage = $backgroundImage;
        $template->title           = $title;
        $template->textContent     = $textContent;
        $template->image           = $image;
        $template->listItems       = $listItems;

        return $template;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): \ArrayObject
    {
        $data = new \ArrayObject();

        $this->valueToArrayIfSet($data, 'type');
        $this->valueToArrayIfSet($data, 'token');
        $this->valueToArrayIfSet($data, 'backButton');
        $this->valueToArrayIfSet($data, 'backgroundImage');
        $this->valueToArrayIfSet($data, 'title');
        $this->valueToArrayIfSet($data, 'textContent');
        $this->valueToArrayIfSet($data, 'image');

        if (!empty($this->listItems)) {
            $data['listItems'] = $this->listItems;
        }

        return $data;
    }
}
