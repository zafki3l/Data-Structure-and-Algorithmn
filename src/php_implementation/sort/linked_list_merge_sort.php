<?php

require_once '../data_structures/linked_list.php';

function mergeSort(LinkedList $linkedList) 
{
    if ($linkedList->size() === 1) {
        return $linkedList;
    } else if ($linkedList->head === null) {
        return $linkedList;
    }

    [$left_list, $right_list] = slice($linkedList);
    $left = mergeSort($left_list);
    $right = mergeSort($right_list);

    return merge($left, $right);
}

function slice(LinkedList $linkedList)
{
    if ($linkedList === null || $linkedList->head === null) {
        $left_list = $linkedList;
        $right_list = null;

        return [$left_list, $right_list];
    } else {
        $size = $linkedList->size();
        $mid = (int) ($size / 2);

        $mid_node = $linkedList->nodeAtIndex($mid - 1);

        $left_list = $linkedList;
        $right_list = new LinkedList();

        $right_list->head = $mid_node->next;
        $mid_node->next = null;

        return [$left_list, $right_list];
    }
}

function merge(LinkedList $left, LinkedList $right)
{
    $temp_list = new LinkedList();
    $temp_list->add(0);

    $current = $temp_list->head;
    
    $left_head = $left->head;
    $right_head = $right->head;

    while ($left_head || $right_head) {
        if ($left_head === null) {
            $current->next = $right_head;
            $right_head = $right_head->next;
        } else if ($right_head === null) {
            $current->next = $left_head;
            $left_head = $left_head->next;
        } else {
            $left_data = $left_head->data;
            $right_data = $right_head->data;

            if ($left_data < $right_data) {
                $current->next = $left_head;
                $left_head = $left_head->next;
            } else {
                $current->next = $right_head;
                $right_head = $right_head->next;
            }
        }

        $current = $current->next;
    }

    $head = $temp_list->head->next;
    $temp_list->head = $head;

    return $temp_list;
}

$linkedList = new LinkedList();
$n1 = new Node(10);
$linkedList->head = $n1;
$linkedList->add(100);
$linkedList->add(200);
$linkedList->insert(12, 2);
$linkedList->add(-2000);
$linkedList->add(300);

$mergeList = mergeSort($linkedList);

print_r($mergeList->list());