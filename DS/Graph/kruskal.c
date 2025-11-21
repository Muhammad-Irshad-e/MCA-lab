#include <stdio.h>
#include <limits.h>  
#define MAX 30

int parent[MAX];
int n;               
int cost[MAX][MAX];  

int find(int i) {
    while (parent[i] != i)
        i = parent[i];
    return i;
}


void unionSet(int a, int b) {
    int x = find(a);
    int y = find(b);
    parent[x] = y;
}

void kruskal() {
    int edgesUsed = 0;
    int totalCost = 0;

    printf("\nEdges\tcost:\n");

    while (edgesUsed < n - 1) {
        int min = INT_MAX;
        int a = -1, b = -1;

        // Find smallest edge in adjacency matrix
        for (int i = 1; i <= n; i++) {
            for (int j = 1; j <= n; j++) {
                if (find(i) != find(j) && cost[i][j] < min) {
                    min = cost[i][j];
                    a = i;
                    b = j;
                }
            }
        }

        if (a == -1)
          break; // No edge left

        printf("%d->%d\t%d\n", a, b, min);
        totalCost += min;
        unionSet(a, b);
        edgesUsed++;

        cost[a][b] = cost[b][a] = INT_MAX;
    }

    printf("\nTotal Minimum Cost = %d\n", totalCost);
}

int main() {
    printf("Enter number of vertices: ");
    scanf("%d", &n);

    printf("Enter cost adjacency matrix (0 for no edge):\n");
    for (int i = 1; i <= n; i++) {
        for (int j = 1; j <= n; j++) {
            scanf("%d", &cost[i][j]);
            if (cost[i][j] == 0)
                cost[i][j] = INT_MAX;
        }
    }

    for (int i = 1; i <= n; i++)
        parent[i] = i;

    kruskal();  

    return 0;
}
