#include <stdio.h>
#include <stdlib.h>


struct node {
	int data;
	struct node *next;
	struct node *prev;
};


int size = 0;
struct node *head = NULL;
struct node *tail = NULL;
struct node *newnode, *delnode, *temp;


int insertion();
int deletion();
void display();


void main() {
	int choice;
	while (1) {
		printf(" \n1. display \n2. insert at the beginning, \n3. insert at the end \n4. insert at any position \n5. delete from beginning \n6. delete from end \n7. delete from any position \n8.exit()  ");
		scanf("%d", &choice);
		switch (choice) {
			case 1:
				display(head);
				break;
			case 2:
				insertAtBeginning();
				break;
			case 3:
				insertAtEnd();
				break;
			case 4:
				inserAtAny();
                break;
            case 5:
                delAtBeginning();
                break;
            case 6:
                delAtEnd();
                break;
            case 7:
                delAtAny();
                break;
            case 8:
                return;
			default:
				break;
		}
	}
}


// Insertion
void insertAtBeginning() 
{
	newnode = (struct node *) malloc(sizeof(struct node));
	printf("Element: ");
	scanf("%d", &newnode->data);
	if (head == NULL) {
		newnode->next = newnode->prev = NULL;
		head = tail = newnode;
		size++;
		display(head);
		return 0;
	}
	newnode->next = head;
	head->prev = newnode;
	head = newnode;
	newnode->prev = NULL;
	size++;
	display(head);
}
void insertAtEnd() {
	newnode = (struct node *) malloc(sizeof(struct node));
	printf("Element: ");
	scanf("%d", &newnode->data);
	if (head == NULL) {
		newnode->next = newnode->prev = NULL;
		head = tail = newnode;
		size++;
		display(head);
		return 0;
	}
	newnode->prev = tail;
	tail->next = newnode;
	tail = newnode;
	newnode->next = NULL;
	size++;
	display(head);
}
void inserAtAny() {
	newnode = (struct node *) malloc(sizeof(struct node));
	printf("Element: ");
	scanf("%d", &newnode->data);
	if (head == NULL) {
		newnode->next = newnode->prev = NULL;
		head = tail = newnode;
		size++;
		display(head);
		return 0;
	}
	int position;
	printf("Position: ");
	scanf("%d", &position);
	if (position <= 1 || position > size) {
		printf("Invalid!\n");
		return;
	}
	temp = head;
	int i = 2;
	while (i < position) {
		temp = temp->next;
		i++;
	}
	newnode->next = temp->next;
	temp->next->prev = newnode;
	temp->next = newnode;
	newnode->prev = temp;
	size++;
	display(head);
}



// Deletion
void delAtBeginning() {
	if (head == NULL) {
		printf("The linked list is empty!\n");
		return 1;
	}
	
	if (size == 1) {
		delnode = head;
		head = NULL;
		tail = NULL;
		free(delnode);
		size--;
		display(head);
		return 0;
	}
	delnode = head;
	temp = head->next;
	head = temp;
	temp->prev = NULL;
	free(delnode);
	size--;
	display(head);
}
void delAtEnd() {
	if (head == NULL) {
		printf("The linked list is empty!\n");
		return 1;
	}
	
	if (size == 1) {
		delnode = head;
		head = NULL;
		tail = NULL;
		free(delnode);
		size--;
		display(head);
		return 0;
	}
	delnode = tail;
	temp = tail->prev;
	tail = temp;
	temp->next = NULL;
	free(delnode);
	size--;
	display(head);
}
void delAtAny() {
	if (head == NULL) {
		printf("The linked list is empty!\n");
		return 1;
	}
	
	if (size == 1) {
		delnode = head;
		head = NULL;
		tail = NULL;
		free(delnode);
		size--;
		display(head);
	}
	int position;
	printf("Position: ");
	scanf("%d", &position);
	if (position < 1 || position > size) {
		printf("Invalid!\n");
		return;
	}
	temp = head;
	int i = 1;
	while (i < position) {
		if (temp->next != NULL) {
			temp = temp->next;
		}
		i++;
	}
	delnode = temp;
	temp->prev->next = temp->next;
	temp->next->prev = temp->prev;
	free(delnode);
	size--;
	display(head);
}

void headtotail(struct node * ptr) {
	if (ptr == NULL)
		return;
	printf("<- %d -> ", ptr->data);

	headtotail(ptr->next);		
}
void tailtohead(struct node *ptr) {
	if (ptr == NULL)
		return;
	printf("<- %d -> ", ptr->data);

	tailtohead(ptr->prev);
}
void display() {
	if (size == 0) {
		printf("The linked list is empty!\n");
		return;
	}
	printf("Head ->");
	headtotail(head);
	printf("<- Tail\nTail ->");
	tailtohead(tail);
	printf("<- Head\n");
}

