<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20211223\Symfony\Component\Console\Completion\Output;

use MonorepoBuilder20211223\Symfony\Component\Console\Completion\CompletionSuggestions;
use MonorepoBuilder20211223\Symfony\Component\Console\Output\OutputInterface;
/**
 * @author Wouter de Jong <wouter@wouterj.nl>
 */
class BashCompletionOutput implements \MonorepoBuilder20211223\Symfony\Component\Console\Completion\Output\CompletionOutputInterface
{
    public function write(\MonorepoBuilder20211223\Symfony\Component\Console\Completion\CompletionSuggestions $suggestions, \MonorepoBuilder20211223\Symfony\Component\Console\Output\OutputInterface $output) : void
    {
        $values = $suggestions->getValueSuggestions();
        foreach ($suggestions->getOptionSuggestions() as $option) {
            $values[] = '--' . $option->getName();
        }
        $output->writeln(\implode("\n", $values));
    }
}
