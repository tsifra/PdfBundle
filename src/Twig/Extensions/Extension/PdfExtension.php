<?php

/*
 * Copyright 2011 Piotr Śliwa <peter.pl7@gmail.com>
 *
 * License information is in LICENSE file
 */

namespace Ps\PdfBundle\Twig\Extensions\Extension;

use Ps\PdfBundle\Templating\ImageLocatorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension.
 *
 * @author Piotr Śliwa <peter.pl7@gmail.com>
 */
class PdfExtension extends AbstractExtension
{
    private $imageLocator;

    public function __construct(ImageLocatorInterface $imageLocator)
    {
        $this->imageLocator = $imageLocator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('pdf_image', [$this, 'getImagePath']),
        ];
    }

    public function getName()
    {
        return 'ps_pdf';
    }

    public function getImagePath($logicalImageName)
    {
        return $this->imageLocator->getImagePath($logicalImageName);
    }
}
