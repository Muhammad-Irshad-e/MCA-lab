#include <stdio.h>
#include <limits.h>

#define MAX 10

void prims(int graph[MAX][MAX], int n)
{
    int selected[MAX]; // Track selected vertices
    int no_of_edges = 0;
    int total_cost = 0;

    // Initialize all vertices as not selected
    for (int i = 0; i < n; i++)
        selected[i] = 0;

    // Start from vertex 0
    selected[0] = 1;

    printf("Edge\tWeight\n");

    // Repeat until we have n-1 edges
    while (no_of_edges < n - 1)
    {
        int min = INT_MAX;
        int x = 0, y = 0;

        // Find the smallest edge between a selected and unselected vertex
        for (int i = 0; i < n; i++)
        {
            if (selected[i])
            {
                for (int j = 0; j < n; j++)
                {
                    if (!selected[j] && graph[i][j] && graph[i][j] < min)
                    {
                        min = graph[i][j];
                        x = i;
                        y = j;
                    }
                }
            }
        }

        printf("%d - %d\t%d\n", x + 1, y + 1, graph[x][y]);
        total_cost += graph[x][y];
        selected[y] = 1;
        no_of_edges++;
    }

    printf("Total cost of Minimum Spanning Tree = %d\n", total_cost);
}

int main()
{
    int n;
    int graph[MAX][MAX];

    printf("Enter number of vertices: ");
    scanf("%d", &n);

    printf("Enter the adjacency matrix (%d x %d):\n", n, n);
    printf("(Enter 0 if there is no edge between two vertices)\n");
    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
            scanf("%d", &graph[i][j]);
            if (graph[i][j] == 0)
                graph[i][j] = INT_MAX; // Treat 0 as no edge
        }
    }

    prims(graph, n);
    return 0;
}
