#include <stdio.h>
#define MAX 100

int queue[MAX];
int front = -1, rear = -1;

// Enqueue operation
void enqueue(int vertex) {
    if (rear == MAX - 1)
        printf("Queue is full!\n");
    else {
        if (front == -1)
            front = 0;
        queue[++rear] = vertex;
    }
}

// Dequeue operation
int dequeue() {
    if (front == -1 || front > rear)
        return -1;
    else
        return queue[front++];
}

// Check if queue is empty
int isEmpty() {
    return (front == -1 || front > rear);
}

// BFS function
void BFS(int adj[MAX][MAX], int vertices, int start) {
    int visited[MAX] = {0};

    printf("BFS traversal starting from vertex %d:\n", start);
    visited[start] = 1;
    enqueue(start);

    while (!isEmpty()) {
        int current = dequeue();
        printf("%d ", current);

        // Visit all adjacent vertices of current
        for (int i = 0; i < vertices; i++) {
            if (adj[current][i] == 1 && visited[i] == 0) {
                visited[i] = 1;
                enqueue(i);
            }
        }
    }
    printf("\n");
}

// Main function
int main() {
    int vertices;
    int adj[MAX][MAX];
    int start;

    printf("Enter number of vertices: ");
    scanf("%d", &vertices);

    printf("Enter adjacency matrix (%d x %d):\n", vertices, vertices);
    for (int i = 0; i < vertices; i++) {
        for (int j = 0; j < vertices; j++) {
            scanf("%d", &adj[i][j]);
        }
    }

    printf("Enter starting vertex: ");
    scanf("%d", &start);

    BFS(adj, vertices, start);

    return 0;
}
