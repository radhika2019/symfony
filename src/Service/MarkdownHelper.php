<?php
namespace App\Service;

use Michelf\MarkdownInterface;
class MarkdownHelper
{

	private $markdown;

	public function __construct(MarkdownInterface $markdown)
    {
        $this->markdown = $markdown;
    }

	public function parse(string $content): string
    {

        return $articleContent = $this->markdown->transform($content); 
    }
}
?>