//
======================================================================================================================================
If you want a complete **Binary Search Tree (BST)** implementation with common methods such as:

* Create Tree
* Insert Node
* Search Node
* Delete Node
* Inorder Traversal
* Preorder Traversal
* Postorder Traversal
* Find Minimum
* Find Maximum
* Display Tree

Here are full class-based examples in both **Python** and **PHP**.

---

# Python BST Implementation

```python
class Node:
    def __init__(self, data):
        self.data = data
        self.left = None
        self.right = None


class BST:
    def __init__(self):
        self.root = None

    # Insert
    def insert(self, data):
        self.root = self._insert(self.root, data)

    def _insert(self, node, data):
        if node is None:
            return Node(data)

        if data < node.data:
            node.left = self._insert(node.left, data)
        elif data > node.data:
            node.right = self._insert(node.right, data)

        return node

    # Search
    def search(self, data):
        return self._search(self.root, data)

    def _search(self, node, data):
        if node is None:
            return False

        if node.data == data:
            return True

        if data < node.data:
            return self._search(node.left, data)

        return self._search(node.right, data)

    # Find Minimum
    def find_min(self):
        node = self.root
        while node.left:
            node = node.left
        return node.data

    # Find Maximum
    def find_max(self):
        node = self.root
        while node.right:
            node = node.right
        return node.data

    # Delete
    def delete(self, data):
        self.root = self._delete(self.root, data)

    def _delete(self, node, data):
        if node is None:
            return node

        if data < node.data:
            node.left = self._delete(node.left, data)

        elif data > node.data:
            node.right = self._delete(node.right, data)

        else:
            # No child
            if node.left is None and node.right is None:
                return None

            # One child
            if node.left is None:
                return node.right

            if node.right is None:
                return node.left

            # Two children
            successor = self._min_node(node.right)
            node.data = successor.data
            node.right = self._delete(node.right, successor.data)

        return node

    def _min_node(self, node):
        while node.left:
            node = node.left
        return node

    # Inorder
    def inorder(self):
        self._inorder(self.root)
        print()

    def _inorder(self, node):
        if node:
            self._inorder(node.left)
            print(node.data, end=" ")
            self._inorder(node.right)

    # Preorder
    def preorder(self):
        self._preorder(self.root)
        print()

    def _preorder(self, node):
        if node:
            print(node.data, end=" ")
            self._preorder(node.left)
            self._preorder(node.right)

    # Postorder
    def postorder(self):
        self._postorder(self.root)
        print()

    def _postorder(self, node):
        if node:
            self._postorder(node.left)
            self._postorder(node.right)
            print(node.data, end=" ")

    # Display
    def display(self):
        print("Inorder:", end=" ")
        self.inorder()


# Example
bst = BST()

bst.insert(50)
bst.insert(30)
bst.insert(70)
bst.insert(20)
bst.insert(40)
bst.insert(60)
bst.insert(80)

bst.display()

print("Search 40:", bst.search(40))
print("Min:", bst.find_min())
print("Max:", bst.find_max())

bst.delete(30)

print("After deleting 30:")
bst.inorder()
```

---

# PHP BST Implementation

```php
<?php

class Node {
    public $data;
    public $left;
    public $right;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BST {
    private $root = null;

    // Insert
    public function insert($data) {
        $this->root = $this->insertNode($this->root, $data);
    }

    private function insertNode($node, $data) {
        if ($node == null) {
            return new Node($data);
        }

        if ($data < $node->data) {
            $node->left = $this->insertNode($node->left, $data);
        } elseif ($data > $node->data) {
            $node->right = $this->insertNode($node->right, $data);
        }

        return $node;
    }

    // Search
    public function search($data) {
        return $this->searchNode($this->root, $data);
    }

    private function searchNode($node, $data) {
        if ($node == null) {
            return false;
        }

        if ($node->data == $data) {
            return true;
        }

        if ($data < $node->data) {
            return $this->searchNode($node->left, $data);
        }

        return $this->searchNode($node->right, $data);
    }

    // Find Minimum
    public function findMin() {
        $node = $this->root;

        while ($node->left != null) {
            $node = $node->left;
        }

        return $node->data;
    }

    // Find Maximum
    public function findMax() {
        $node = $this->root;

        while ($node->right != null) {
            $node = $node->right;
        }

        return $node->data;
    }

    // Delete
    public function delete($data) {
        $this->root = $this->deleteNode($this->root, $data);
    }

    private function deleteNode($node, $data) {
        if ($node == null) {
            return null;
        }

        if ($data < $node->data) {
            $node->left = $this->deleteNode($node->left, $data);
        } elseif ($data > $node->data) {
            $node->right = $this->deleteNode($node->right, $data);
        } else {

            // No child
            if ($node->left == null && $node->right == null) {
                return null;
            }

            // One child
            if ($node->left == null) {
                return $node->right;
            }

            if ($node->right == null) {
                return $node->left;
            }

            // Two children
            $successor = $this->minNode($node->right);

            $node->data = $successor->data;

            $node->right =
                $this->deleteNode($node->right, $successor->data);
        }

        return $node;
    }

    private function minNode($node) {
        while ($node->left != null) {
            $node = $node->left;
        }

        return $node;
    }

    // Inorder
    public function inorder() {
        $this->inorderTraversal($this->root);
        echo PHP_EOL;
    }

    private function inorderTraversal($node) {
        if ($node != null) {
            $this->inorderTraversal($node->left);
            echo $node->data . " ";
            $this->inorderTraversal($node->right);
        }
    }

    // Preorder
    public function preorder() {
        $this->preorderTraversal($this->root);
        echo PHP_EOL;
    }

    private function preorderTraversal($node) {
        if ($node != null) {
            echo $node->data . " ";
            $this->preorderTraversal($node->left);
            $this->preorderTraversal($node->right);
        }
    }

    // Postorder
    public function postorder() {
        $this->postorderTraversal($this->root);
        echo PHP_EOL;
    }

    private function postorderTraversal($node) {
        if ($node != null) {
            $this->postorderTraversal($node->left);
            $this->postorderTraversal($node->right);
            echo $node->data . " ";
        }
    }

    // Display
    public function display() {
        echo "Inorder: ";
        $this->inorder();
    }
}


// Example
$bst = new BST();

$bst->insert(50);
$bst->insert(30);
$bst->insert(70);
$bst->insert(20);
$bst->insert(40);
$bst->insert(60);
$bst->insert(80);

$bst->display();

echo "Search 40: ";
echo $bst->search(40) ? "Found\n" : "Not Found\n";

echo "Min: " . $bst->findMin() . PHP_EOL;
echo "Max: " . $bst->findMax() . PHP_EOL;

$bst->delete(30);

echo "After deleting 30:" . PHP_EOL;
$bst->inorder();

?>
```

### Time Complexity of BST Operations

| Operation | Average  | Worst Case |
| --------- | -------- | ---------- |
| Insert    | O(log n) | O(n)       |
| Search    | O(log n) | O(n)       |
| Delete    | O(log n) | O(n)       |
| Min/Max   | O(log n) | O(n)       |
| Traversal | O(n)     | O(n)       |

The worst case occurs when the BST becomes skewed (like a linked list). Balanced trees such as AVL Trees or Red-Black Trees keep operations near O(log n).
======================================================================================================================================
from collections import deque
from typing import Optional, List


class Node:
    """Represents a single node in the BST."""

    def __init__(self, data: int):
        self.data = data
        self.left: Optional["Node"] = None
        self.right: Optional["Node"] = None


class BinarySearchTree:
    """Full BST implementation with create, insert, delete, search, traversals."""

    def __init__(self):
        self.root: Optional[Node] = None

    # ---------- CREATE / INSERT ----------

    def insert(self, data: int) -> None:
        self.root = self._insert_node(self.root, data)

    def _insert_node(self, node: Optional[Node], data: int) -> Node:
        if node is None:
            return Node(data)

        if data < node.data:
            node.left = self._insert_node(node.left, data)
        elif data > node.data:
            node.right = self._insert_node(node.right, data)
        # duplicates ignored

        return node

    # ---------- SEARCH ----------

    def search(self, data: int) -> bool:
        return self._search_node(self.root, data)

    def _search_node(self, node: Optional[Node], data: int) -> bool:
        if node is None:
            return False
        if data == node.data:
            return True
        return self._search_node(node.left if data < node.data else node.right, data)

    # ---------- DELETE ----------

    def delete(self, data: int) -> None:
        self.root = self._delete_node(self.root, data)

    def _delete_node(self, node: Optional[Node], data: int) -> Optional[Node]:
        if node is None:
            return None

        if data < node.data:
            node.left = self._delete_node(node.left, data)
        elif data > node.data:
            node.right = self._delete_node(node.right, data)
        else:
            # Node found

            # Case 1: no children
            if node.left is None and node.right is None:
                return None

            # Case 2: one child
            if node.left is None:
                return node.right
            if node.right is None:
                return node.left

            # Case 3: two children -> inorder successor
            successor = self._find_min(node.right)
            node.data = successor.data
            node.right = self._delete_node(node.right, successor.data)

        return node

    def _find_min(self, node: Node) -> Node:
        while node.left is not None:
            node = node.left
        return node

    def _find_max(self, node: Node) -> Node:
        while node.right is not None:
            node = node.right
        return node

    # ---------- MIN / MAX ----------

    def get_min(self) -> Optional[int]:
        if self.root is None:
            return None
        return self._find_min(self.root).data

    def get_max(self) -> Optional[int]:
        if self.root is None:
            return None
        return self._find_max(self.root).data

    # ---------- HEIGHT ----------

    def height(self) -> int:
        return self._height_node(self.root)

    def _height_node(self, node: Optional[Node]) -> int:
        if node is None:
            return -1  # empty tree height = -1, single node = 0
        return 1 + max(self._height_node(node.left), self._height_node(node.right))

    # ---------- COUNT NODES ----------

    def count_nodes(self) -> int:
        return self._count_helper(self.root)

    def _count_helper(self, node: Optional[Node]) -> int:
        if node is None:
            return 0
        return 1 + self._count_helper(node.left) + self._count_helper(node.right)

    # ---------- TRAVERSALS (SHOW) ----------

    def inorder(self) -> List[int]:
        result: List[int] = []
        self._inorder_helper(self.root, result)
        return result

    def _inorder_helper(self, node: Optional[Node], result: List[int]) -> None:
        if node is None:
            return
        self._inorder_helper(node.left, result)
        result.append(node.data)
        self._inorder_helper(node.right, result)

    def preorder(self) -> List[int]:
        result: List[int] = []
        self._preorder_helper(self.root, result)
        return result

    def _preorder_helper(self, node: Optional[Node], result: List[int]) -> None:
        if node is None:
            return
        result.append(node.data)
        self._preorder_helper(node.left, result)
        self._preorder_helper(node.right, result)

    def postorder(self) -> List[int]:
        result: List[int] = []
        self._postorder_helper(self.root, result)
        return result

    def _postorder_helper(self, node: Optional[Node], result: List[int]) -> None:
        if node is None:
            return
        self._postorder_helper(node.left, result)
        self._postorder_helper(node.right, result)
        result.append(node.data)

    def level_order(self) -> List[int]:
        result: List[int] = []
        if self.root is None:
            return result

        queue = deque([self.root])
        while queue:
            node = queue.popleft()
            result.append(node.data)
            if node.left is not None:
                queue.append(node.left)
            if node.right is not None:
                queue.append(node.right)

        return result

    # ---------- VISUAL DISPLAY ----------

    def display(self) -> None:
        if self.root is None:
            print("Tree is empty")
            return
        self._display_helper(self.root, "", True)

    def _display_helper(self, node: Optional[Node], prefix: str, is_tail: bool) -> None:
        if node is None:
            return

        if node.right is not None:
            self._display_helper(node.right, prefix + ("│   " if is_tail else "    "), False)

        print(prefix + ("└── " if is_tail else "┌── ") + str(node.data))

        if node.left is not None:
            self._display_helper(node.left, prefix + ("    " if is_tail else "│   "), True)

    # ---------- IS EMPTY ----------

    def is_empty(self) -> bool:
        return self.root is None


# =====================================================
# DEMO
# =====================================================

if __name__ == "__main__":
    bst = BinarySearchTree()

    values = [50, 30, 70, 20, 40, 60, 80, 10, 25]
    for v in values:
        bst.insert(v)

    print("Tree structure:")
    bst.display()

    print(f"\nInorder (sorted):   {', '.join(map(str, bst.inorder()))}")
    print(f"Preorder:           {', '.join(map(str, bst.preorder()))}")
    print(f"Postorder:          {', '.join(map(str, bst.postorder()))}")
    print(f"Level order (BFS):  {', '.join(map(str, bst.level_order()))}")

    print(f"\nMin value: {bst.get_min()}")
    print(f"Max value: {bst.get_max()}")
    print(f"Height: {bst.height()}")
    print(f"Total nodes: {bst.count_nodes()}")

    print(f"\nSearch 40: {'Found' if bst.search(40) else 'Not found'}")
    print(f"Search 99: {'Found' if bst.search(99) else 'Not found'}")

    print("\nDeleting 30 (node with two children)...")
    bst.delete(30)
    bst.display()
    print(f"Inorder after delete: {', '.join(map(str, bst.inorder()))}")

    print("\nDeleting 20 (node with one child)...")
    bst.delete(20)
    bst.display()

    print("\nDeleting 80 (leaf node)...")
    bst.delete(80)
    bst.display()
    print(f"Inorder after deletes: {', '.join(map(str, bst.inorder()))}")
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================
======================================================================================================================================