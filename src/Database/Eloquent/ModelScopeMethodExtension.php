<?php

declare(strict_types=1);

/**
 * This file is part of Laravel Code Analyse.
 *
 * (c) Nuno Maduro <enunomaduro@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace NunoMaduro\LaravelCodeAnalyse\Database\Eloquent;

use PHPStan\Reflection\ClassReflection;
use NunoMaduro\LaravelCodeAnalyse\Concerns\HasScope;

/**
 * @internal
 */
class ModelScopeMethodExtension extends ModelMethodExtension
{
    use HasScope;

    /**
     * {@inheritdoc}
     */
    protected function searchIn(ClassReflection $classReflection): array
    {
        return [$classReflection->getName()];
    }
}
