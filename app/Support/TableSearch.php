<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Builder;

class TableSearch
{
    /** Each word must match at least one column, including related records. */
    public static function apply(Builder $query, string $search, array $columns): Builder
    {
        $terms = preg_split('/\s+/u', trim($search), -1, PREG_SPLIT_NO_EMPTY) ?: [];

        foreach ($terms as $term) {
            // Treat SQL wildcard characters as literal text entered by the user.
            $pattern = '%'.str_replace(['!', '%', '_'], ['!!', '!%', '!_'], mb_strtolower($term)).'%';

            $query->where(function (Builder $group) use ($columns, $pattern) {
                foreach ($columns as $field) {
                    $separator = strrpos($field, '.');

                    if ($separator === false) {
                        self::whereLike($group, $field, $pattern, 'or');
                    } else {
                        $relation = substr($field, 0, $separator);
                        $column = substr($field, $separator + 1);
                        $group->orWhereHas($relation, function (Builder $related) use ($column, $pattern) {
                            self::whereLike($related, $column, $pattern);
                        });
                    }
                }
            });
        }

        return $query;
    }

    private static function whereLike(Builder $query, string $column, string $pattern, string $boolean = 'and'): void
    {
        $column = $query->getQuery()->getGrammar()->wrap($query->getModel()->qualifyColumn($column));
        $query->whereRaw("LOWER({$column}) LIKE ? ESCAPE '!'", [$pattern], $boolean);
    }
}
