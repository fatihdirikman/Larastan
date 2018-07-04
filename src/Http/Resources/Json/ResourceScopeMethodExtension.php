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

namespace NunoMaduro\LaravelCodeAnalyse\Http\Resources\Json;

use ReflectionClass;
use Illuminate\Database\Eloquent\Model;
use PHPStan\Reflection\ClassReflection;
use Illuminate\Http\Resources\Json\Resource;
use NunoMaduro\LaravelCodeAnalyse\Database\Eloquent\ModelScopeMethodExtension;

final class ResourceScopeMethodExtension extends ModelScopeMethodExtension
{
    /**
     * {@inheritdoc}
     */
    protected function searchIn(ClassReflection $classReflection): array
    {
        return collect(get_declared_classes())
            ->filter(
                function ($item) {
                    return (new ReflectionClass($item))->isSubclassOf(Model::class);
                }
            )
            ->toArray();
    }

    /**
     * Returns the class under analyse.
     *
     * @return string
     */
    protected function subject(): string
    {
        return Resource::class;
    }
}
