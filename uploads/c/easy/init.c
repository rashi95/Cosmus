#include<stdio.h>

int main()
{
	int A[1000], n;
	scanf("%d",&n);
	int currmin;
  	for (int i=0; i<n; i++)
   	if (A[i] > currmin)
      		currmin = A[i];
  	return currmin;
}
