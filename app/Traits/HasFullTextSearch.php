<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

trait HasFullTextSearch
{
    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>|Relation<TModel>  $query
     * @param  array<int, string>  $columns
     */
    protected function applyFullTextSearch(Builder|Relation $query, string $searchTerm, array $columns, ?string $language = null): void
    {
        if (blank($searchTerm)) {
            return;
        }

        $strategy = $this->resolveSearchStrategy();
        $strategy($query, $searchTerm, $columns, $language);
    }

    /**
     * @template TModel of Model
     *
     * @return callable(Builder<TModel>|Relation<TModel>, string, array<int, string>, ?string): void
     */
    protected function resolveSearchStrategy(): callable
    {
        return match (config('database.default')) {
            'pgsql' => $this->applyPostgreSQLFullTextSearch(...),
            default => $this->applyGenericSearch(...),
        };
    }

    protected function getFullTextSearchLanguage(?string $language): string
    {
        return $language ?? config('app.fulltext_language', 'portuguese');
    }

    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>|Relation<TModel>  $query
     * @param  array<int, string>  $columns
     */
    protected function applyPostgreSQLFullTextSearch(Builder|Relation $query, string $searchTerm, array $columns, ?string $language = null): void
    {
        $lang = $this->getFullTextSearchLanguage($language);

        $tsVector = $columns
            |> (static fn (array $cols): array => array_map(
                static fn (string $column): string => sprintf("to_tsvector('%s', COALESCE(%s, ''))", $lang, $column),
                $cols,
            ))
            |> (static fn (array $parts): string => implode(' || ', $parts));

        $query->whereRaw(
            sprintf("(%s) @@ plainto_tsquery('%s', ?)", $tsVector, $lang),
            [$searchTerm],
        );
    }

    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>|Relation<TModel>  $query
     * @param  array<int, string>  $columns
     */
    protected function applyGenericSearch(Builder|Relation $query, string $searchTerm, array $columns, ?string $language = null): void
    {
        $likePattern = sprintf('%%%s%%', $searchTerm);

        $query->where(
            fn (Builder $q): Builder => array_reduce(
                $columns,
                static fn (Builder $builder, string $column): Builder => $builder->orWhere($column, 'like', $likePattern),
                $q,
            ),
        );
    }
}
