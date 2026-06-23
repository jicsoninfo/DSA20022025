<?php

/**
 * Node class - represents a single node in the BST
 */
class Node
{
    public int $data;
    public ?Node $left;
    public ?Node $right;

    public function __construct(int $data)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

/**
 * BinarySearchTree class - full BST implementation
 */
class BinarySearchTree
{
    private ?Node $root;

    public function __construct()
    {
        $this->root = null;
    }

    // ---------- CREATE / INSERT ----------

    public function insert(int $data): void
    {
        $this->root = $this->insertNode($this->root, $data);
    }

    private function insertNode(?Node $node, int $data): Node
    {
        if ($node === null) {
            return new Node($data);
        }

        if ($data < $node->data) {
            $node->left = $this->insertNode($node->left, $data);
        } elseif ($data > $node->data) {
            $node->right = $this->insertNode($node->right, $data);
        }
        // duplicate values are ignored

        return $node;
    }

    // ---------- SEARCH ----------

    public function search(int $data): bool
    {
        return $this->searchNode($this->root, $data);
    }

    private function searchNode(?Node $node, int $data): bool
    {
        if ($node === null) {
            return false;
        }

        if ($data === $node->data) {
            return true;
        }

        return $data < $node->data
            ? $this->searchNode($node->left, $data)
            : $this->searchNode($node->right, $data);
    }

    // ---------- DELETE ----------

    public function delete(int $data): void
    {
        $this->root = $this->deleteNode($this->root, $data);
    }

    private function deleteNode(?Node $node, int $data): ?Node
    {
        if ($node === null) {
            return null;
        }

        if ($data < $node->data) {
            $node->left = $this->deleteNode($node->left, $data);
        } elseif ($data > $node->data) {
            $node->right = $this->deleteNode($node->right, $data);
        } else {
            // Node found

            // Case 1: no children
            if ($node->left === null && $node->right === null) {
                return null;
            }

            // Case 2: one child
            if ($node->left === null) {
                return $node->right;
            }
            if ($node->right === null) {
                return $node->left;
            }

            // Case 3: two children
            // Find inorder successor (smallest in right subtree)
            $successor = $this->findMin($node->right);
            $node->data = $successor->data;
            $node->right = $this->deleteNode($node->right, $successor->data);
        }

        return $node;
    }

    private function findMin(Node $node): Node
    {
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node;
    }

    private function findMax(Node $node): Node
    {
        while ($node->right !== null) {
            $node = $node->right;
        }
        return $node;
    }

    // ---------- MIN / MAX ----------

    public function getMin(): ?int
    {
        if ($this->root === null) {
            return null;
        }
        return $this->findMin($this->root)->data;
    }

    public function getMax(): ?int
    {
        if ($this->root === null) {
            return null;
        }
        return $this->findMax($this->root)->data;
    }

    // ---------- HEIGHT ----------

    public function height(): int
    {
        return $this->heightNode($this->root);
    }

    private function heightNode(?Node $node): int
    {
        if ($node === null) {
            return -1; // empty tree height = -1, single node = 0
        }
        return 1 + max($this->heightNode($node->left), $this->heightNode($node->right));
    }

    // ---------- COUNT NODES ----------

    public function countNodes(): int
    {
        return $this->countNodesHelper($this->root);
    }

    private function countNodesHelper(?Node $node): int
    {
        if ($node === null) {
            return 0;
        }
        return 1 + $this->countNodesHelper($node->left) + $this->countNodesHelper($node->right);
    }

    // ---------- TRAVERSALS (SHOW) ----------

    public function inorder(): array
    {
        $result = [];
        $this->inorderHelper($this->root, $result);
        return $result;
    }

    private function inorderHelper(?Node $node, array &$result): void
    {
        if ($node === null) {
            return;
        }
        $this->inorderHelper($node->left, $result);
        $result[] = $node->data;
        $this->inorderHelper($node->right, $result);
    }

    public function preorder(): array
    {
        $result = [];
        $this->preorderHelper($this->root, $result);
        return $result;
    }

    private function preorderHelper(?Node $node, array &$result): void
    {
        if ($node === null) {
            return;
        }
        $result[] = $node->data;
        $this->preorderHelper($node->left, $result);
        $this->preorderHelper($node->right, $result);
    }

    public function postorder(): array
    {
        $result = [];
        $this->postorderHelper($this->root, $result);
        return $result;
    }

    private function postorderHelper(?Node $node, array &$result): void
    {
        if ($node === null) {
            return;
        }
        $this->postorderHelper($node->left, $result);
        $this->postorderHelper($node->right, $result);
        $result[] = $node->data;
    }

    public function levelOrder(): array
    {
        $result = [];
        if ($this->root === null) {
            return $result;
        }

        $queue = [$this->root];
        while (!empty($queue)) {
            $node = array_shift($queue);
            $result[] = $node->data;

            if ($node->left !== null) {
                $queue[] = $node->left;
            }
            if ($node->right !== null) {
                $queue[] = $node->right;
            }
        }

        return $result;
    }

    // ---------- VISUAL DISPLAY ----------

    public function display(): void
    {
        if ($this->root === null) {
            echo "Tree is empty\n";
            return;
        }
        $this->displayHelper($this->root, "", true);
    }

    private function displayHelper(?Node $node, string $prefix, bool $isTail): void
    {
        if ($node === null) {
            return;
        }

        if ($node->right !== null) {
            $this->displayHelper($node->right, $prefix . ($isTail ? "│   " : "    "), false);
        }

        echo $prefix . ($isTail ? "└── " : "┌── ") . $node->data . "\n";

        if ($node->left !== null) {
            $this->displayHelper($node->left, $prefix . ($isTail ? "    " : "│   "), true);
        }
    }

    // ---------- IS EMPTY ----------

    public function isEmpty(): bool
    {
        return $this->root === null;
    }
}

// =====================================================
// DEMO
// =====================================================

$bst = new BinarySearchTree();

$values = [50, 30, 70, 20, 40, 60, 80, 10, 25];
foreach ($values as $v) {
    $bst->insert($v);
}

echo "Tree structure:\n";
$bst->display();

echo "\nInorder (sorted):   " . implode(", ", $bst->inorder()) . "\n";
echo "Preorder:           " . implode(", ", $bst->preorder()) . "\n";
echo "Postorder:          " . implode(", ", $bst->postorder()) . "\n";
echo "Level order (BFS):  " . implode(", ", $bst->levelOrder()) . "\n";

echo "\nMin value: " . $bst->getMin() . "\n";
echo "Max value: " . $bst->getMax() . "\n";
echo "Height: " . $bst->height() . "\n";
echo "Total nodes: " . $bst->countNodes() . "\n";

echo "\nSearch 40: " . ($bst->search(40) ? "Found" : "Not found") . "\n";
echo "Search 99: " . ($bst->search(99) ? "Found" : "Not found") . "\n";

echo "\nDeleting 30 (node with two children)...\n";
$bst->delete(30);
$bst->display();
echo "Inorder after delete: " . implode(", ", $bst->inorder()) . "\n";

echo "\nDeleting 20 (node with one child)...\n";
$bst->delete(20);
$bst->display();

echo "\nDeleting 80 (leaf node)...\n";
$bst->delete(80);
$bst->display();
echo "Inorder after deletes: " . implode(", ", $bst->inorder()) . "\n";
