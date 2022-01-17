<?php

namespace Source\Http;

trait RouterGroup
{    
    /**
     * @var array
     */
    private $groupStack = [];

    public function group($attributes, \Closure $target)
    {
        $this->updateGroupStack($attributes);
        $target($this);
        array_pop($this->groupStack);
    }

    private function updateGroupstack($attributes)
    {
        if (!empty($this->groupStack)) {
            $attributes = $this->mergeWithLastGroup($attributes);
        }
        $this->groupStack[] = $attributes;
    }

    private function mergeWithLastGroup($new)
    {
        return $this->mergeGroup($new, end($this->groupStack));
    }

    private function mergeGroup($new, $old)
    {
        $new["namespace"] = static::formatNamespacePrefix($new, $old);
        $new["prefix"]    = static::formatGroupPrefix($new, $old);

        if (isset($old["as"])) {
            $new["as"] = $old["as"] . (isset($new["as"]) ? "." . $new["as"] : "");
        }
        return array_merge_recursive(["namespace", "prefix", "as"], $new);
    }

    private static function formatNamespacePrefix($new, $old)
    {
        if (isset($new["namespace"])) {
            return isset($old["namespace"]) && strpos($new["namespace"], "\\") !== 0
                ? trim($old["namespace"], "\\") . "\\" . trim($new["namespace"], "\\")
                : trim($new["namespace"], "\\");
        }
        return $old["namespace"] ?? null;
    }

    private static function formatGroupPrefix($new, $old)
    {
        $oldPrefix = $old["prefix"] ?? null;

        if (isset($new["prefix"])) {
            return trim($oldPrefix, "/") . "/" . trim($new["prefix"], "/");
        }
        return $oldPrefix;
    }

    public function hasGroupStack()
    {
        return !empty($this->groupStack);
    }
}
