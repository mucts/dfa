<?php


namespace MuCTS\DFA;


class HashMap
{
    /**
     * 哈希表变量
     *
     * @var array|null
     */
    protected $hashTable = [];

    public function __construct()
    {
    }

    /**
     * 向HashMap中添加一个键值对
     *
     * @param string $key
     * @param mixed $value
     * @return mixed|null
     */
    public function put(string $key, $value)
    {
        $_temp = $this->get($key);
        // 向HashMap中添加一个键值对
        $this->hashTable[$key] = $value;
        return $_temp;
    }

    /**
     * 根据key获取对应的value
     *
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->hashTable[$key] ?? null;
    }

    /**
     * 删除指定key的键值对
     *
     * @param string $key
     * @return mixed|null
     */
    public function remove(string $key)
    {
        $tempTable = array();
        if (array_key_exists($key, $this->hashTable)) {
            $tempValue = $this->hashTable[$key];
            while ($curValue = current($this->hashTable)) {
                if (!(key($this->hashTable) == $key)) {
                    $tempTable[key($this->hashTable)] = $curValue;
                }
                next($this->hashTable);
            }
            $this->hashTable = null;
            $this->hashTable = $tempTable;
            return $tempValue;
        }
        return null;
    }

    /**
     * 获取HashMap的所有键值
     *
     * @return array
     */
    public function keys(): array
    {
        return array_keys($this->hashTable);
    }

    /**
     * 获取HashMap的所有value值
     *
     * @return array
     */
    public function values(): array
    {
        return array_values($this->hashTable);
    }

    /**
     * 将一个HashMap的值全部put到当前HashMap中
     *
     * @param HashMap $map
     */
    public function putAll(HashMap $map)
    {
        if (!$map->isEmpty() && $map->size() > 0) {
            $keys = $map->keys();
            foreach ($keys as $key) {
                $this->put($key, $map->get($key));
            }
        }
    }

    /**
     * 移除HashMap中所有元素
     *
     * @return bool
     */
    public function removeAll(): bool
    {
        $this->hashTable = null;
        return true;
    }

    /**
     * 判断HashMap中是否包含指定的值
     *
     * @param $value
     * @return bool
     */
    public function containsValue($value): bool
    {
        while ($curValue = current($this->hashTable)) {
            if ($curValue == $value) {
                return true;
            }
            next($this->hashTable);
        }
        return false;
    }

    /**
     * 判断HashMap中是否包含指定的键key
     *
     * @param string $key
     * @return bool
     */
    public function containsKey(string $key): bool
    {
        if (array_key_exists($key, $this->hashTable)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取HashMap中元素个数
     *
     * @return int
     */
    public function size(): int
    {
        return count($this->hashTable);
    }

    /**
     * 判断HashMap是否为空
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return (count($this->hashTable) == 0);
    }

    /**
     * 判断HashMap是否不为空
     *
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return !$this->isEmpty();
    }
}