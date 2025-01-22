<?php

//
// @see https://github.com/VincentLanglet/Twig-CS-Fixer/blob/main/docs/configuration.md
//

$finder = new TwigCsFixer\File\Finder();
$finder->in('templates');

$ruleset = new TwigCsFixer\Ruleset\Ruleset();

// You can start from a default standard
$ruleset->addStandard(new TwigCsFixer\Standard\TwigCsFixer());

// And then add/remove/override some rules
//$ruleset->addRule(new TwigCsFixer\Rules\File\FileExtensionRule());
//$ruleset->removeRule(TwigCsFixer\Rules\Whitespace\EmptyLinesRule::class);
//$ruleset->overrideRule(new TwigCsFixer\Rules\Punctuation\PunctuationSpacingRule(
//    ['}' => 1],
//    ['{' => 1],
//));

$config = new TwigCsFixer\Config\Config();
$config->setRuleset($ruleset);
$config->setFinder($finder);

return $config;
