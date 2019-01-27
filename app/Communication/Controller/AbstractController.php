<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 27-Jan-19
 * Time: 17:28
 */

namespace App\Communication\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

class AbstractController
{
    const VIEWS_PATH = BASE_PATH.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'View';

    protected function render($view, array $viewData = []): Response
    {
        $filesystemLoader = new FilesystemLoader(self::VIEWS_PATH.DIRECTORY_SEPARATOR.'%name%');
        $templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
        $view = $templating->render($view.'.php', $viewData);
        return new Response($view, Response::HTTP_OK, ['content-type' => 'text/html']);
    }
}