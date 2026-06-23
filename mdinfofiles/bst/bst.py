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
