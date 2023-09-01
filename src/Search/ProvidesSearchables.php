<?php

namespace Statamic\Search;

use Illuminate\Support\Enumerable;

interface ProvidesSearchables
{
    public static function handle(): string;

    public static function referencePrefix(): string;

    public function setKeys(array $keys): self;

    public function provide(): Enumerable;

    public function contains($searchable): bool;

    public function find(array $keys): Enumerable;
}
