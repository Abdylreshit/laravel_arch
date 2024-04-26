<?php

namespace App\Containers\WarehouseSection\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Kalnoy\Nestedset\Collection;
use Kalnoy\Nestedset\NodeTrait;

class CustomCollection extends Collection
{
    public function toTree($root = false, array $sortBy = ['created_at', 'priority'])
    {
        if ($this->isEmpty()) {
            return new static;
        }

        $this->linkNodes();

        $items = [ ];

        $root = $this->getRootNodeId($root);

        if (!empty($sortBy)){
            foreach ($sortBy as $sort) {
                $this->items = Arr::sort($this->items, function ($node) use ($sort) {
                    return $node->{$sort};
                });
            }
        }

        /** @var Model|NodeTrait $node */
        foreach ($this->items as $node) {
            if ($node->getParentId() == $root) {
                $items[] = $node;
            }
        }

        return new static($items);
    }
}
