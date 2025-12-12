<?php

class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList
{
    public function __construct(public $head = null) 
    {
        $head = $this->head;
    }

    public function isEmpty()
    {
        return $this->head == null;
    }

    public function size()
    {
        $current = $this->head;
        $count = 0;

        while ($current) {
            $count++;
            $current = $current->next;
        }

        return $count;
    }

    public function add($data)
    {
        $new_node = new Node($data);
        $new_node->next = $this->head;
        $this->head = $new_node;
    }

    public function insert($data, $index)
    {
        if ($index == 0) {
            $this->insertAtFirst($data);
        }

        $this->insertAtMiddle($data, $index);
    }

    public function insertAtFirst($data)
    {
        $this->add($data);
    }

    public function insertAtMiddle($data, $index)
    {
        $new_node = new Node($data);

        $current = $this->findInsertPostition($index);

        $prev_node = $current;
        $next_node = $current->next;

        $new_node->next = $next_node;
        $prev_node->next = $new_node;
    }

    private function findInsertPostition($index)
    {
        $current = $this->head;

        for ($i = 0; $i < $index - 1; $i++) {
            if ($current == null) {
                return;
            }

            $current = $current->next;
        }

        return $current;
    }

    public function search($key)
    {
        $current = $this->head;
        $count = 0;

        while ($current) {
            if ($current->data === $key) {
                return $current->data;
            }
            $current = $current->next;
            $count++;
        }

        return -1;
    }

    public function list()
    {
        $nodes = [];

        $current = $this->head;

        while ($current) {
            $nodes[] = $current->data;
            
            $current = $current->next;
        }

        return implode(' -> ', $nodes);
    }

    public function remove($key) 
    {
        $current = $this->head;
        $previous = null;
        $found = false;

        while ($current && !$found) {
            if ($current->data == $key && $current == $this->head) {
                $found = true;
                $this->head = $current->next;
            } else if ($current->data == $key) {
                $found = true;
                $previous->next = $current->next;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        return $current;
    }

    public function nodeAtIndex($index)
    {
        if ($index === 0) {
            return $this->head;
        } else {
            $current = $this->head;
            $position = 0;

            while ($position < $index) {
                $current = $current->next;
                $position++;
            }

            return $current;
            
        }
    }
}