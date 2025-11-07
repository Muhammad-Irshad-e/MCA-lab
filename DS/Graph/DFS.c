#include<stdio.h>
#include<stdlib.h>
#define MAX 10
int stack[MAX];
int top = -1;
void push(int data) {
    if (top == MAX - 1) {
        printf("Stack Overflow\n");
        return;
    }
    stack[++top] = data;
}
int pop() {
    if (top == -1) {
        printf("Stack Underflow\n");
        return -1;
    }
    return stack[top--];
}

void DFS(int adj[MAX][MAX], int vertices, int start) {
    int visited[MAX] = {0};
    push(start);

    printf("DFS traversal starting from vertex %d:\n", start);
    while (top != -1) {
        int current = pop();
        if (!visited[current]) {
            visited[current] = 1;
            printf("%d ", current);

            // Push all adjacent vertices of current
            for (int i = vertices - 1; i >= 0; i--) {
                if (adj[current][i] == 1 && !visited[i]) {
                    push(i);
                }
            }
        }
    }
    printf("\n");
}
int main() {
    int vertices;
    int adj[MAX][MAX];
    int start;

    printf("Enter number of vertices: ");
    scanf("%d", &vertices);

    printf("Enter adjacency matrix:\n");
    for (int i = 0; i < vertices; i++) {
        for (int j = 0; j < vertices; j++) {
            scanf("%d", &adj[i][j]);
        }
    }

    printf("Enter starting vertex for DFS: ");
    scanf("%d", &start);

    DFS(adj, vertices, start);

    return 0;
}



