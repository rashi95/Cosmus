#include<stdio.h>
int isPowerOfTwo(n) {
  while (n % 2 == 0) { 
    n <<= 1;
  }
  if (n = 1) {
    return 1;
  }
  return 0;
}
int main()
{
	int N;
	scanf("%d",N);
	if(isPowerOfTwo(N))
		printf("Yes\n",N);
	else
		printf("No\n");
}
